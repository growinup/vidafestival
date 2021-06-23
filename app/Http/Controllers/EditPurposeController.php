<?php

namespace App\Http\Controllers;

use App\EditPurpose;
use Illuminate\Http\Request;

class EditPurposeController extends Controller
{

    public function geteditpurposesall() {
        $editPurposes = EditPurpose::get();

        return response([

            'data' => $editPurposes,
            'success' => true,
        ]);
    }


    public function geteditpurposesallshowlist() {
        return view ('editpurposes.index');
    }

    public function editpurposeStore(Request $request) {

            $myPurpose = EditPurpose::create([
                'name' => $request->name,
            ]);
          
            return response([
                'success' => true,
            ]);
   
    }


    public function editpurposeEdit(Request $request) {
        $myId =  $request->purposeId;

        $myPurpose = EditPurpose::where('id',$myId)
        ->update([
            'name' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);
    }

    public function deleteeditpurpose(Request $request) {
        $data = EditPurpose::find($request->IDPurpose);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        
    }

}
