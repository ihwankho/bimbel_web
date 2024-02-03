<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class UploadController extends Controller
{
    public function showForm()
    {
        return view('upload'); // Ganti 'upload' dengan nama file blade yang sesuai dengan kebutuhan Anda
    }

    public function uploadFile(Request $request)
    {
        // Validation
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        ]);

        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            // File upload location
            $location = 'uploads';

            // Upload file
            $file->move($location, $filename);

            Session::flash('message', 'Upload Successfully.');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'File not uploaded.');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->route('home'); // Ganti 'home' dengan nama rute yang sesuai dengan kebutuhan Anda
    }
}
