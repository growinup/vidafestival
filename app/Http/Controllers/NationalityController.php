<?php

namespace App\Http\Controllers;

use App\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    public function getAllNationalities() {
   
        $myNationalities = Nationality::get();

        return response([
            'data' => $myNationalities,
            'success' => true,
        ]);

    }

    public function getNationalitiesAllShowList() {
        return view ('nationalities.index');
    }




    public function nationalityStore(Request $request) {

        $myNationality = Nationality::create([
            'name' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);

    }


    public function nationalityEdit(Request $request) {
        $myId =  $request->nationalityId;

        $myNationality = Nationality::where('id',$myId)
        ->update([
            'name' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);
    }

    public function deleteNationality(Request $request) {
        $data = Nationality::find($request->nationalityId);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        
    }    
}
