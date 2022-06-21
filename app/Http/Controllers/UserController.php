<?php

namespace App\Http\Controllers;

use App\Models\file;
use App\Models\User;
use Inertia\Inertia;
use App\Models\classTeacher;
use App\Models\studentclass;
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

    public function editMarks($id)
    {
        $stu = self::getUser($id);
        $marks = studentclass::where('studentid', $id)->get();
        $student['name'] = $stu['name'];
        $student['First'] = $marks[0]['First'];
        $student['Mid'] = $marks[0]['Mid'];
        $student['Final'] = $marks[0]['Final'];
        return Inertia::render('EditMarks', ['student' => $student]);
    }


    //*********************************************

    public function students()
    {
        $students = User::where('type', '2')->get();
        return Inertia::render('Students', ['students' => $students]);
    }

    public function teachers()
    {
        $teachers = User::where('type', '1')->get();
        return Inertia::render('Teachers', ['teachers' => $teachers]);
    }

    public function classes()
    {
        $clasess = classTeacher::all();
        return Inertia::render('Classes', ['classes' => $clasess]);
    }
    //*********************************************

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
}
