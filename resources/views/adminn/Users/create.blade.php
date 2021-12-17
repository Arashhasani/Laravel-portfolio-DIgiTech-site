<?php
/**
 * Created by PhpStorm.
 * User: Arash
 * Date: 12/16/2021
 * Time: 2:06 PM
 */


?>


@component('adminn.layouts.content')




    @slot('breadcrumb')



        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="javascript:void(0)">Users</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Create User</a></li>
            </ol>
        </div>


    @endslot


    <div class="row">


        <div class="col-lg-12">


            <div class="card">
                @include('error')
                <div class="card-header">
                    <h4 class="card-title">Create User</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form method="post" action="{{route('users.store')}}" >
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                </div>


                            </div>




                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" id="verified" type="checkbox" name="verified">
                                    <label for="verified" class="form-check-label">
                                        verified
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>

    </div>



@endcomponent
