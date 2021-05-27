<?php

use Illuminate\Support\Facades\Config;

function get_languages(){
  return \App\Models\Language::active()->selection()->get();
}

function getDefault_lang(){
   return Config::get('app.locale');
}

function upload_image($folder,$image){

    $image->store('/',$folder);
    $filename=$image->hashName();
    $path='images/'.$folder.'/'.$filename;
    return $path;
}
