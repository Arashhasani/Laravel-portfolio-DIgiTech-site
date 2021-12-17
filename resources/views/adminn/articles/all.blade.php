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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Articles</a></li>
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
                                <th>TITLE</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($articles as $article)



                                <tr>
                                    <td><strong>{{$article['id']}}</strong></td>
                                    <td>{{$article['title']}}</td>
                                    <td>{{date_format($article['created_at'],'M d,Y')}}0</td>
                                    <td>
                                        @if($article->published())
                                            <span class="badge light badge-success">Published</span>
                                        @else

                                            <span class="badge light badge-danger">Pending</span>

                                        @endif
                                    </td>
                                    <td>
                                        @can('crud',auth()->user())

                                            <div class="dropdown">
                                                <button type="button" class="btn btn-success light sharp"
                                                        data-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"/>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"/>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"/>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <form method="post"
                                                          action="{{route('articles.destroy',['article'=>$article['id']])}}"
                                                          id="deletearticleform{{$article['id']}}">@csrf @method('DELETE')</form>
                                                    <a class="dropdown-item"
                                                       href="{{route('articles.edit',['article'=>$article['id']])}}">Edit</a>
                                                    <a onclick="event.preventDefault();document.getElementById('deletearticleform{{$article['id']}}').submit()"
                                                       class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        @endcan

                                    </td>
                                </tr>


                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">


                    <ul class="pagination">
                        {{$articles->links('pagination::bootstrap-4')}}

                    </ul>


                </div>
            </div>
        </div>

    </div>



@endcomponent
