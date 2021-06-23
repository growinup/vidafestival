<?php

namespace App\Http\Controllers;

use App\Ban;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BanController extends Controller
{

    public function showview() {
        return view ('bans.index');
    }

    public function index () {
        $bans = Ban::all();
        return response(['data' => $bans]);
    }







    public function banStore(Request $request) {
                
        // try {
        //     $fecha = Carbon::createFromFormat('d/m/Y', $request->date);
        //     $myBirthDate = $fecha->format('Y-m-d');
        // } catch (\Throwable $th) {
        //     $myBirthDate = null;
        // }

        $ban_fecha_resoluciontmp = Carbon::createFromFormat('d/m/Y', $request->ban_fecha_resolucion);
        $ban_fecha_resolucion = $ban_fecha_resoluciontmp->format('Y-m-d');

        $ban_fecha_iniciotmp = Carbon::createFromFormat('d/m/Y', $request->ban_fecha_inicio);
        $ban_fecha_inicio = $ban_fecha_iniciotmp->format('Y-m-d');

        $ban_fecha_fintmp = Carbon::createFromFormat('d/m/Y', $request->ban_fecha_fin);
        $ban_fecha_fin = $ban_fecha_fintmp->format('Y-m-d');
        
        
        
        $myBan = Ban::create([
            'guest_id' => $request->ban_guest_id,
            'ejercicio' => $request->ban_ejercicio,
            'expediente' => $request->ban_expediente,
            'delegacion' => $request->ban_delegacion,
            'identificacion' => $request->ban_identificacion,
            'nombre' =>  $request->ban_nombre,
            'fecha_resolucion' => $ban_fecha_resolucion,
            'fecha_inicio' => $ban_fecha_inicio,
            'fecha_fin' => $ban_fecha_fin
        ]);
      
        return response([
            'success' => true,
        ]);

    }

    public function banEdit(Request $request) {
        $myId =  $request->banId;
        
        $ban_fecha_resoluciontmp = Carbon::createFromFormat('d/m/Y', $request->ban_fecha_resolucion);
        $ban_fecha_resolucion = $ban_fecha_resoluciontmp->format('Y-m-d');

        $ban_fecha_iniciotmp = Carbon::createFromFormat('d/m/Y', $request->ban_fecha_inicio);
        $ban_fecha_inicio = $ban_fecha_iniciotmp->format('Y-m-d');

        $ban_fecha_fintmp = Carbon::createFromFormat('d/m/Y', $request->ban_fecha_fin);
        $ban_fecha_fin = $ban_fecha_fintmp->format('Y-m-d');

        $myBan = Ban::where('id',$myId)
        ->update([
            'ejercicio' => $request->ban_ejercicio,
            'expediente' => $request->ban_expediente,
            'delegacion' => $request->ban_delegacion,
            'identificacion' => $request->ban_identificacion,
            'nombre' =>  $request->ban_nombre,
            'fecha_resolucion' => $ban_fecha_resolucion,
            'fecha_inicio' => $ban_fecha_inicio,
            'fecha_fin' => $ban_fecha_fin
         
        ]);
      
        return response([
            'success' => true,
            'data' => $myBan
        ]);
    }

    public function deleteBan(Request $request) {
        $data = Ban::find($request->banId);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        
    }        









}
