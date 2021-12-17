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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Comments</a></li>
            </ol>
        </div>


    @endslot


    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Comments</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                            <tr>
                                <th class="width80">#</th>
                                <th>Comment</th>
                                <th>Title</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($comments as $comment)



                                <tr>
                                    <td><strong>{{$comment['id']}}</strong></td>
                                    <td>{{$comment['comment']}}</td>
                                    <td>{{$comment->commentable->title ?? '-'}}</td>
                                    <td>{{date_format($comment['created_at'],'M d,Y')}}0</td>
                                    <td>
                                        @if($comment->approved())
                                            <span class="badge light badge-success">Aproved</span>
                                            @else

                                            <span class="badge light badge-danger">Not Aproved</span>

                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <form method="post" action="{{route('comments.destroy',['comment'=>$comment['id']])}}" id="commentformdelete{{$comment['id']}}">@csrf @method('DELETE')</form>
                                            <form method="post" action="{{route('comments.update',['comment'=>$comment['id']])}}" id="commentformupdate{{$comment['id']}}">@csrf @method('PATCH')</form>
                                            <a onclick="event.preventDefault();document.getElementById('commentformupdate{{$comment['id']}}').submit()"  href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a onclick="event.preventDefault();document.getElementById('commentformdelete{{$comment['id']}}').submit()" href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                </tr>


                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">


                    <ul class="pagination">
                        {{$comments->links('pagination::bootstrap-4')}}

                    </ul>



                </div>
            </div>
        </div>

    </div>



@endcomponent
