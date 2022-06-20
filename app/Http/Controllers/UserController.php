<?php

namespace App\Http\Controllers;

use App\Models\file;
use App\Models\User;
use Inertia\Inertia;
use App\Models\classTeacher;
use App\Models\studentclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getClass($classid)
    {
        $class = classTeacher::find($classid);
        return $class;
    }

    public function getFiles($classid)
    {
        $files = file::where('classid', $classid)->get();

        /*
        foreach ($files as $file) {

            $file->all()->toJson(); //['decode'] = json_decode($file['FileDecoded']);
        }
        */


        return $files;
    }

    public function getUser($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function getStudents($classid)
    {
        $students = studentclass::where('classid', $classid)->get();
        return $students;
    }

    public function returnclass($classid)
    {
        $class = self::getClass($classid);
        $files = self::getFiles($classid);
        $teacher = self::getUser($class['teacherId']);

        $class['tname'] = $teacher['name'];
        $class['tphone'] = $teacher['phoneNumber'];
        $class['temail'] = $teacher['email'];

        return Inertia::render('classS', ['classs' => $class, 'file' => $files]); //->with('file', json_decode($files, true));
    }

    public function returnteacher($id)
    {
        $teacher = self::getUser($id);
        return Inertia::render('teacherProfile', ['tech' => $teacher]);
    }

    public function returnstudent($id)
    {
        $student = self::getUser($id);
        return Inertia::render('studentProfile', ['stud' => $student]);
    }

    public function returnclassT($classid)
    {
        $class = self::getClass($classid);
        $files = self::getFiles($classid);
        $students = self::getStudents($classid);
        foreach ($students as $student) {
            $student['name'] = self::getUser($student['studentid'])['name'];
        }

        return Inertia::render('classT', ['classs' => $class, 'file' => $files, 'students' => $students]);
    }

    public function uploadfile(Request $request)
    {
        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'mimes:pdf,ppt,pptx,pptm'
        ]);
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = time() . '.' . $file->extension();
                $file->move(base_path() . '/storage/app/public', $name);
                $data[] = $name;
            }
        }


        $file = new File();
        $file->classid = $request->classid;
        $file->FileName =  $name;
        $file->FileDecoded = json_encode($data);
        $file->save();


        return back()->with('success', 'Your files has been send successfully');
    }
    public function students()
    {
        $students = User::where('type', '2')->get();
        return Inertia::render('students', ['students' => $students]);
    }

    public function teachers()
    {
        $teachers = User::where('type', '1')->get();
        return Inertia::render('teachers', ['teachers' => $teachers]);
    }

    public function student()
    {
        if (Auth::check()) {
            $id = auth()->user()->id;
            $list = studentclass::where('studentid', $id)->get();

            foreach ($list as $lii) {
                $lii['name'] = classTeacher::find($lii['classid'])['ClassName'];
            }
            return Inertia::render('Student', ['list' => $list]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    //*********************************************

    public function teacher()
    {
        if (Auth::check()) {
            $id = auth()->user()->id;
            $list = classTeacher::where('teacherId', $id)->get();
            return Inertia::render('Teacher', ['list' => $list]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    //*********************************************

    /*
    public function classes()
    {
        $clasess = classTeacher::all();
        return Inertia::render('classes', ['classes' => $clasess]);
        //return view('classes', ['classes' => $clasess]);
    }
    */
}
