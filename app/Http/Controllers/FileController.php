<?php

namespace App\Http\Controllers;

use App\Models\file;

use Illuminate\Http\Request;

class FileController extends Controller
{
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
}
