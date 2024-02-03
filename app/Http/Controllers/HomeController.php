<?php
  
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
  
class HomeController extends Controller
{
    public function index()
    {
        $client = new Client();

        $url = env('API_URL');

        $response = $client->request("GET", $url . "/schedules")->getBody();

        $data = json_decode($response, true)['data'];

        $schedule = "";
        
        foreach ($data as $d) {
            $schedule = $d;
        }

        return view('home', compact('schedule'));
    }
}
