<?php
/**
 * Created by PhpStorm.
 * User: Arash
 * Date: 12/16/2021
 * Time: 2:20 PM
 */




if (!function_exists('isActive')){
    function isActive($key){

        if (is_array($key)){

            return in_array(\Illuminate\Support\Facades\Route::currentRouteName(),$key) ? 'mm-active' : '';
        }else{
            return \Illuminate\Support\Facades\Route::currentRouteName() == $key ? 'mm-active' : '';

        }


    }
}
?>


