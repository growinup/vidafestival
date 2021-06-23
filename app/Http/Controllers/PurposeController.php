<?php

namespace App\Http\Controllers;

use App\Purpose;
use App\Language;
use App\Nationality;
use App\InvitationType;
use Illuminate\Http\Request;

class PurposeController extends Controller
{
    public function index () {

        $purposes = Purpose::get();

        $invitationType = InvitationType::get();

        $languages = Language::get();

        $nationalities = Nationality::get();

        return response ([
            'purposes' => $purposes,
            'invitationtypes' => $invitationType,
            'languages' => $languages,
            'nationalities' => $nationalities,
            'success' => true
           ]);
    }

    public function getpurposesall() {

        $purposes = Purpose::get();

        return response ([
            'data' => $purposes,

            'success' => true
           ]);
    }


    public function getpurposesallshowlist() {
        return view ('purposes.index');
    }





    public function purposeStore(Request $request) {

        $myPurpose = Purpose::create([
            'name' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);

    }


    public function purposeEdit(Request $request) {

        $myId =  $request->purposeId;

        $myPurpose = Purpose::where('id',$myId)
        ->update([
            'name' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);

    }





    public function deletePurpose(Request $request) {
 
        $data = Purpose::find($request->IDPurpose);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        

    }

}
