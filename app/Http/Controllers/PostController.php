<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $client = new Client();
        $url = env("API_URL");

        $posts = json_decode($client->request("GET", $url. '/notifications')->getBody(), true)['data'];

        // return view('master', compact('posts'));
        return view('posts', compact("posts"));
    }

    public function show(String $id)
    {
        $client = new Client();
        $url = env("API_URL");

        $posts = json_decode($client->request("GET", $url. '/notifications'. $id)->getBody(), true)['data'];

        // return view('master', compact('posts'));
        return view('posts', compact("posts"));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validasi data input jika diperlukan
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Simpan data baru ke dalam database
        $client = new Client();
        $url = env("API_URL");

        $response = json_decode($client->request("POST", $url. "/notifications", [
            "multipart"=>[
                [
                    "name"=> "title",
                    "contents"=>$request->title
                ],
                [
                    "name"=> "contents",
                    "contents"=>$request->content
                ],
            ]
        ])->getBody(), true)['status'];

        // $data = $request->except('_token');

        if(!$response){
            return redirect()->route('posts.index')
                             ->with('failed', 'Post created failed');
        }

        // Redirect ke halaman index
        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully');
    }

    public function edit(String $id){
        $client = new Client();
        $url = env("API_URL");

        $data = json_decode($client->request("GET", $url. "/notifications/". $id)->getBody(), true)['data'];
        return view('editpost', compact("data"));
    }

    public function update(Request $request, String $id){
         // Simpan data baru ke dalam database
         $client = new Client();
         $url = env("API_URL");
 
         $response = json_decode($client->request("POST", $url. "/notifications/". $id, [
             "multipart"=>[
                 [
                     "name"=> "title",
                     "contents"=>$request->title
                 ],
                 [
                     "name"=> "contents",
                     "contents"=>$request->content
                 ],
             ]
         ])->getBody(), true)['status'];
 
         // $data = $request->except('_token');
 
         if(!$response){
             return redirect()->route('posts.index')
                              ->with('failed', 'Post edited failed');
         }
 
         // Redirect ke halaman index
         return redirect()->route('posts.index')
                          ->with('success', 'Post edited successfully');
    }

    public function destroy(String $id){
        $client = new Client();
        $url = env("API_URL");

        $response = json_decode($client->request("DELETE", $url. "/notifications/" . $id)->getBody(), true)['status'];

        if(!$response){
            return redirect("/posts")->with("failed", "failed delete data");
        }
        return redirect("/posts")->with("success", "failed delete data");
    }



    // Metode lain seperti edit, update, delete dapat ditambahkan sesuai kebutuhan
}
