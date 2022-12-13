<?php

namespace App\Traits;

Trait  LoginTrait
{
    function saveImage($image,$folder){
        //save photo in folder
        $file_extension = $image -> getClientOriginalExtension();
        $file_name ='images/'.'route_'.time().'.'.$image->getClientOriginalExtension();
        $path = $folder;
        $image -> move($path,$file_name);

        return $file_name;
    }


}
