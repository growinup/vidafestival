<?php

namespace App\Http\Controllers;

use App\InvitationType;
use Illuminate\Http\Request;

class InvitationTypeController extends Controller
{
    public function getInvitationTypesAllShowList() {
        return view ('invitation-types.index');
    }

    public function getAllInvitationTypes() {
   
        $myInvitationTypes = InvitationType::get();

        return response([
            'data' => $myInvitationTypes,
            'success' => true,
        ]);

    }

    public function invitationTypeStore(Request $request) {

        $myInvitationType = InvitationType::create([
            'nombre' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);

    }


    public function invitationTypeEdit(Request $request) {
        $myId =  $request->invitationTypeId;

        $myInvitationType = InvitationType::where('id',$myId)
        ->update([
            'nombre' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);
    }

    public function deleteInvitationType(Request $request) {
        $data = InvitationType::find($request->invitationTypeId);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        
    }        
}
