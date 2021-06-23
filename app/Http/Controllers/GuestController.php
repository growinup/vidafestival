<?php

namespace App\Http\Controllers;

use App\Guest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index () {
        $guests = Guest::all();
        return response(['data' => $guests]);
    }

    public function showview() {
        return view('guests.index');
    }
    

    public function checkIfGuestExists($guestId) {
        $myGuestId = strtolower($guestId);

        $myGuestData = DB::table('guests')->where('dni', '=', $myGuestId)->get();

        $myGuestDataForbidden = DB::table('bans')->where('identificacion', '=', $myGuestId)->get();
        

        $now = Carbon::now();                
        $accesoProhibido = false;

        if ($myGuestDataForbidden->count() > 0) {

                if ( $now >=  $myGuestDataForbidden[0]->fecha_inicio && $now <= $myGuestDataForbidden[0]->fecha_fin ) {
                    $accesoProhibido = true;
                }

        }

        return response(
            ['success' => true,
            'mydate' => $now,
            'acceso_prohibido' => $accesoProhibido,
            'forbbiden' => $myGuestDataForbidden->count(),
            'data' => $myGuestData,
            'mydata' => $myGuestData->count()
            ]
        );
    }



    public function checkIfGuestDniExists($guestId) {
        $myGuestId = strtolower($guestId);

        $myGuestData = DB::table('guests')->where('dni', '=', $myGuestId)->get();

        return response(
            ['success' => true,        
            'data' => $myGuestData->count(),
            ]
        );
    }




    public function guestStore(Request $request) {
                
        try {
            $fecha = Carbon::createFromFormat('d/m/Y', $request->date);
            $myBirthDate = $fecha->format('Y-m-d');
        } catch (\Throwable $th) {
            $myBirthDate = null;
        }

        
        $myGuest = Guest::create([
            'nombre' => $request->name,
            'apellidos' => $request->last_name,
            'dni' => $request->dni,
            'email' => $request->email,
            'fecha_nacimiento' => $myBirthDate,
            'nationality_id' => $request->nationality_id,
            'es_menor' => $request->es_menor
        ]);
      
        return response([
            'success' => true,
            'date' => $myBirthDate
        ]);

    }

    public function guestEdit(Request $request) {
        $myId =  $request->guestId;
        
        $fecha = Carbon::createFromFormat('d/m/Y', $request->date);
        $myBirthDate = $fecha->format('Y-m-d');

        $myGuest = Guest::where('id',$myId)
        ->update([
            'nombre' => $request->name,
            'apellidos' => $request->last_name,
            'dni' => $request->dni,
            'email' => $request->email,
            'fecha_nacimiento' => $myBirthDate,
            'nationality_id' => $request->nationality_id,
            'es_menor' => $request->es_menor
        ]);
      
        return response([
            'success' => true,
            'data' => $myGuest
        ]);
    }

    public function deleteGuest(Request $request) {
        $data = Guest::find($request->guestId);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        
    }        

}
