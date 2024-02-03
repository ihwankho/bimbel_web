<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        try {
            $schedules = Schedule::all();

            for ($i = 0; $i < $schedules->count(); $i++) {
                $schedules[$i]->image = url("/schedules/" . $schedules[$i]->image);
            }

            return response()->json([
                "status" => true,
                "message" => "GET all data successfully",
                "data" => $schedules
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
            ]);
        }
    }

    public function show(String $id)
    {
        try {
            $schedule = Schedule::findOrFail($id);

            $schedule->image = url("/schedules/" . $schedule->image);

            return response()->json([
                "status" => true,
                "message" => "GET data by id successfully",
                "data" => $schedule
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                "name" => "required",
                "image" => "required|file"
            ]);

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $request['image'] = $fileName;
            $file->move(public_path('/schedules'), $fileName);

            $response = Schedule::create([
                "name" => $request->name,
                "image" => $fileName
            ]);

            return response()->json([
                "status" => true,
                "message" => "POST data successfully",
                "data_created" => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, String $id)
    {
        try {
            $schedule = Schedule::findOrFail($id);

            $fileName = $schedule->image;

            if ($request->file('image')) {
                $file = $request->file('image');
                unlink(public_path("/schedules/" . $fileName));
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/schedules'), $fileName);
            }
            dd($request->name);
            $schedule->name = $request->name;
            $schedule->image = $fileName;
            $schedule->save();

            return response()->json([
                "status" => true,
                "message" => "PUT data successfully",
                "updated_data" => $request
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    public function destroy(String $id)
    {
        try {
            $schedule = Schedule::findOrFail($id);

            unlink(public_path("/schedules/" . $schedule->image));

            $schedule->delete();

            return response()->json([
                "status" => true,
                "message" => "DELETE data successfully"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage()
            ]);
        }
    }
}
