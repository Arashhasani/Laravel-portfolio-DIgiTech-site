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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Users</a></li>
            </ol>
        </div>


    @endslot


    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Articles</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                            <tr>
                                <th class="width80">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($users as $user)



                                <tr>
                                    <td><strong>{{$user['id']}}</strong></td>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>{{date_format($user['created_at'],'M d,Y')}}0</td>
                                    <td>
                                        @if($user->hasVerifiedEmail())
                                            <span class="badge light badge-success">Verified</span>
                                            @else

                                            <span class="badge light badge-danger">Not Verified</span>

                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success light sharp"
                                                    data-toggle="dropdown">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" cx="5" cy="12" r="2"/>
                                                        <circle fill="#000000" cx="12" cy="12" r="2"/>
                                                        <circle fill="#000000" cx="19" cy="12" r="2"/>
                                                    </g>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('users.edit',['user'=>$user['id']])}}">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">


                    <ul class="pagination">
                        {{$users->links('pagination::bootstrap-4')}}

                    </ul>



                </div>
            </div>
        </div>

    </div>



@endcomponent
