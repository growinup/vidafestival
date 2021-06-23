<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $guarded = [];
    protected $table = 'email_templates';


    public function parse($data)
{
    $parsed = preg_replace_callback('/{{(.*?)}}/', function ($matches) use ($data) {
        list($shortCode, $index) = $matches;

        if( isset($data[$index]) ) {
            return $data[$index];
        } else {
            throw new Exception("Shortcode {$shortCode} no encontrado en la plantilla con id {$this->id}", 1);   
        }

    }, $this->content);
    //$parsed = $parsed . '<hr> <p>Este es el aviso legal </p> ';
    return $parsed;

}



}
