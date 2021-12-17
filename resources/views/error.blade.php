<?php
/**
 * Created by PhpStorm.
 * User: Arash
 * Date: 12/16/2021
 * Time: 4:17 PM
 */

?>


@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)


            <li>{{$error}}</li>

        @endforeach
    </ul>


@endif

