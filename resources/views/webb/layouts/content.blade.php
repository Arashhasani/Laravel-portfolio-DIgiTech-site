<?php
/**
 * Created by PhpStorm.
 * User: Arash
 * Date: 12/16/2021
 * Time: 11:44 AM
 */


?>


@extends('webb.master')


@section('layoutclass')
    {{$layoutclass ?? ''}}
    @endsection

@section('content')




  {{$breadcrumb}}


   {{$slot}}





    @endsection


@section('sidebar')

{{$side ?? ''}}
    @endsection


@section('script')

    {{$script ?? ''}}
    @endsection

