<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $client = new Client();

        $url = env('API_URL');

        $response = $client->request("GET", $url . "/schedules")->getBody();

        $data = json_decode($response, true)['data'];

        return view("schedule.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();

        $url = env('API_URL');

        $response = $client->request("POST", $url . "/schedules", [
            "multipart" => [
                [
                    "name" => "name",
                    "contents" => $request->name,
                ],
                [
                    "name" => "image",
                    "contents" => fopen($request->file('image'), 'r'),
                    "filename" => $request->file('image')->getClientOriginalName(),
                    "headers" => [
                        "Content-Type" => "<Content-type header>"
                    ]
                ]
            ]
        ]);

        return redirect('/home')->with('success', 'Success add data schedule');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = new Client();

        $url = env('API_URL');

        $response = $client->request("GET", $url . "/schedules/" . $id)->getBody();

        $data = json_decode($response, true)['data'];

        return view("schedule.show", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client();

        $url = env('API_URL');

        $response = $client->request("GET", $url . "/schedules/" . $id)->getBody();

        $data = json_decode($response, true)['data'];

        return view("schedule.edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = new Client();

        $url = env('API_URL');

        $response = $client->request("PUT", $url . "/schedules/" . $id, [
            "multipart" => [
                [
                    "name" => "name",
                    "contents" => $request->name,
                ],
                [
                    "name" => "image",
                    "contents" => fopen($request->file('image'), 'r'),
                    "filename" => $request->file('image')->getClientOriginalName(),
                    "headers" => [
                        "Content-Type" => "<Content-type header>"
                    ]
                ]
            ]
        ]);

        return redirect('/schedule')->with('success', 'Success edit data schedule');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $url = env("API_URL");
        $response = $client->request("DELETE", $url . '/schedules/' . $id)->getBody();
        // dd(json_decode($response, true));
        if (!json_decode($response, true)['status']) {
            return redirect('/schedule')->with('failed', 'failed delete data');
        }

        return redirect('/schedule')->with('success', 'success delete data');
    }
}
