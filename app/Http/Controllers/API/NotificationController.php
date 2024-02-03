<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index()
    {
        try {
            $notifications = Notification::all();

            return response()->json([
                "status" => true,
                "message" => "GET all data notifications successfully",
                "data" => $notifications
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    public function show(String $id)
    {
        try {
            $notification = Notification::findOrFail($id);

            return response()->json([
                "status" => true,
                "message" => "GET data notification by id successfully",
                "data" => $notification
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "title" => "required",
                "contents" => "required",
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => false,
                    "message" => $validator->errors()->all()
                ]);
            }

            Notification::create($request->all());

            return response()->json([
                "status" => true,
                "message" => "CREATE data notification by id successfully",
                "data_created" => $request->all()
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
            $notification = Notification::findOrFail($id);

            $title = $notification->title;
            if ($request->title) {
                $title = $request->title;
            }

            $contents = $notification->contents;
            if ($request->contents) {
                $contents = $notification->contents;
            }

            $notification->update([
                "title" => $title,
                "contents" => $contents
            ]);

            return response()->json([
                "status" => true,
                "message" => "EDIT data notification by id successfully",
                "data_edited" => [
                    "title" => $title,
                    "contents" => $contents
                ]
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
            $notification = Notification::findOrFail($id);

            $notification->delete();

            return response()->json([
                "status" => true,
                "message" => "DELETE data notification by id successfully"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage()
            ]);
        }
    }
}
