<?php
/**
 * Created by PhpStorm.
 * User: Arash
 * Date: 12/16/2021
 * Time: 2:03 PM
 */

?>


@extends('adminn.master')



@section('content')





    <div class="container-fluid">
        <!-- Add Order -->



        {{--<div class="modal fade" id="addOrderModalside">--}}
            {{--<div class="modal-dialog" role="document">--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<h5 class="modal-title">Add Event</h5>--}}
                        {{--<button type="button" class="close" data-dismiss="modal"><span>&times;</span>--}}
                        {{--</button>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body">--}}
                        {{--<form>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="text-black font-w500">Event Name</label>--}}
                                {{--<input type="text" class="form-control">--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="text-black font-w500">Event Date</label>--}}
                                {{--<input type="date" class="form-control">--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="text-black font-w500">Description</label>--}}
                                {{--<input type="text" class="form-control">--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<button type="button" class="btn btn-primary">Create</button>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

       {{$breadcrumb}}
       {{$slot}}
    </div>


    @endsection


@section('script')

    {{$script ?? ''}}
    @endsection

