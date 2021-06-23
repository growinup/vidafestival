<?php

namespace App\Http\Controllers;

use App\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TemplateController extends Controller
{

    public function index() {
        return view ('mailtemplates.index');
        }


    public function show() {
        return view ('mailtemplates.edit');
    }


    // clonar plantilla
    public function clone(EmailTemplate $template) {

        return view ('mailtemplates.edit', 
        [
            'template' => $template,
            'edicion' => 1
        ]);
        
    }    


    // edicion de plantilla

    public function edit(EmailTemplate $template) {

        return view ('mailtemplates.edit', 
        [
            'template' => $template,
            'edicion' => 2
        ]);
        
    }    


    
    

    public function gettemplatebyid ( $id ) {

        $template = EmailTemplate::where('id',$id)
            ->get();

        return response([
        'template' => $template,
        'success' => true,
        ]);

    }


    public function sendEmail(Request $request) 
    {
        $user = 'George';
        $template = EmailTemplate::where('name', 'welcome-email')->first();

        Mail::send([], [], function($message) use ($template, $user)
        {
            $data = [
                'firstname' => 'George'
            ];
        
            $message->to('georgemileson@gmail.com', 'George')   
                ->subject($template->subject)
                ->setBody($template->parse($data),'text/html');
        });

        return response ([
            'success' => true
           ]);

    }


    public function templatestore(Request $request) {

        $myInvitation = EmailTemplate::create([
            'content' => $request->content,
            'subject' => $request->asunto,
            'location_id' => $request->location_id,
            'language_id' => $request->lang_id,
            'activity_id' => $request->activity_id,
            'activity_type_id' => $request->type_id,
            'name' => $request->templateName,
            'invitation_type_id' => $request->invitationTypeId,
 
        ]);
      
        return response([
            'success' => true,
        ]);

    }


    public function templateedit(Request $request) {

        $myId =  $request->templateId;

        $myTemplateUpdated = EmailTemplate::where('id',$myId)
        ->update([
            'content' => $request->content,
            'subject' => $request->asunto,
            'location_id' => $request->location_id,
            'language_id' => $request->lang_id,
            'activity_id' => $request->activity_id,
            'activity_type_id' => $request->type_id,
            'name' => $request->templateName,
            'invitation_type_id' => $request->invitationTypeId,
 
        ]);
      
        return response([
            'success' => true,
        ]);

    }


    public function upload(Request $request)
    {
    
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
       
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
       
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
       
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
       
            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
     
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore); 
            $msg = 'Imagen cargada correctamente'; 
            
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            // echo $re;
            echo "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
        }      

    }

   
    public function getTemplates($activity_id,$activity_type_id) {
   
        $myTemplatesInvitacion = EmailTemplate::where('activity_id',$activity_id)
                                    ->where('activity_type_id',$activity_type_id)
                                    ->where('invitation_type_id',1)->orderBy('language_id')
                                    ->get();

        $myTemplatesCompra = EmailTemplate::where('activity_id',$activity_id)
                                    ->where('activity_type_id',$activity_type_id)
                                    ->where('invitation_type_id',2)->orderBy('language_id')
                                    ->get();
        
        $myTemplatesPases = EmailTemplate::where('activity_id',$activity_id)
                                    ->where('activity_type_id',$activity_type_id)
                                    ->where('invitation_type_id',3)->orderBy('language_id')
                                    ->get();
    
        return response([
            'plantillasinvitacion' => $myTemplatesInvitacion,
            'plantillascompra' => $myTemplatesCompra,
            'plantillaspases' => $myTemplatesPases,
            'success' => true,
        ]);
    
    }




    public function getAllTemplates() {
   
        $templates = EmailTemplate::get();

        return response([

            'data' => $templates,
            'success' => true,
        ]);
    
    }    

    public function deleteTemplate(Request $request) {
 
        $data = EmailTemplate::find($request->IDPlantilla);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        

    }


}
