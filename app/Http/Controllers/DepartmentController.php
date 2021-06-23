<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index($id)
    {
        if($id != 0) {
            $myDepartments = Department::where(['area_id' => $id])->orderBy('nombre')->get();
        } else {
            $myDepartments = Department::orderBy('nombre')->get();

        }

        return response(['data' => $myDepartments]);
    }

    public function getDepartmentsShowList() {
        return view ('departments.index');
    }

    public function getAllDepartments() {
        $myAreas = Department::orderBy('nombre')->get();
        return response(
            [
                'success'    => true,
                'data' => $myAreas
            ]
        );
    }


        public function departmentStore(Request $request) {
        
        $myArea = Department::create([
            'nombre' => $request->name,
            'area_id' => $request->areaId,
        ]);
      
        return response([
            'success' => true,
        ]);

    }
    

    public function departmentEdit(Request $request) {
        $myId =  $request->departmentId;

        $myDepartment = Department::where('id',$myId)
        ->update([
            'nombre' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);
    }    
    
    public function deleteDepartment(Request $request) {
        $data = Department::find($request->departmentId);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        
    }                
}
