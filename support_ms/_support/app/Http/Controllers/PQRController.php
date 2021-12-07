<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PQR;

class PQRController extends Controller
{
    public function show()
   {

        $pqr = PQR::all();
        return $pqr;
    //    return view('post', [
    //        'post' => Post::where('slug', '=', $slug)->first()
    //    ]);
   }

   public function store(Request $request)
   {
       $pqr = new PQR;

       $pqr->message = $request->message;
       $pqr->response = $request->response;
       $pqr->id_user = $request->id_user;
       $pqr->id_trip = $request->id_trip;
       $pqr->state = $request->state;

       $pqr->save();

       return response()->json(["result" => "ok"], 201);
   }

   public function destroy($pqrId)
 {
     $pqr = PQR::find($pqrId);
     $pqr->delete();

     return response()->json(["result" => "ok"], 200);       
 }

 public function update(Request $request, $pqrId)
   {
       $pqr = PQR::find($pqrId);
       $pqr->message = $request->message;
       $pqr->response = $request->response;
       $pqr->id_user = $request->id_user;
       $pqr->id_trip = $request->id_trip;
       $pqr->state = $request->state;
       $pqr->save();

       return response()->json(["result" => "ok"], 201);       
   }
}
