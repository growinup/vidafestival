<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function getLanguages() {
   
        $mylang = Language::get();

        return response([
            'languages' => $mylang,
            'success' => true,
        ]);

    }


    public function getAllLanguages() {
   
        $mylang = Language::get();

        return response([
            'data' => $mylang,
            'success' => true,
        ]);

    }

    public function getLanguagesAllShowList() {
        return view ('languages.index');
    }


    public function languageStore(Request $request) {

        $myLanguage = Language::create([
            'name' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);

    }


    public function languageEdit(Request $request) {
        $myId =  $request->languageId;

        $myLanguage = Language::where('id',$myId)
        ->update([
            'name' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);
    }

    public function deleteLanguage(Request $request) {
        $data = Language::find($request->languageId);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        
    }    
}
