<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        try {
            $idUser = request("id-user");

            if($idUser != null){
                $transaksis = Transaksi::where('customer_id', '=', $idUser)->get();
            }else{
                $transaksis = Transaksi::all();
            }

            return response()->json([
                "status"=>true,
                "message"=>"GET All Data Transaction",
                "data"=>$transaksis
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status"=>false,
                "message"=>$e->getMessage()
            ]);
        }
    }

    public function show(String $id){
        try {
            $transaksi = Transaksi::find($id);

            return response()->json([
                "status"=>true,
                "message"=> "GET Data Transaction By Id",
                "data"=> $transaksi
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status"=>false,
                "message"=>$e->getMessage()
            ]);
        }
    }

    public function destroy(String $id){
        try {
            $transaksi = Transaksi::find($id);

            if($transaksi->bukti_bayar){
                unlink(public_path('/bukti_bayar'. $transaksi->bukti_bayar));
            }
            $transaksi->delete();

            return response()->json([
                "status"=>true,
                "message" => "DELETE Data Transaction By Id"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status"=>false,
                "message"=>$e->getMessage()
            ]);
        }
    }
}
