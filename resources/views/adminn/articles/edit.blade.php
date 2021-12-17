<?php
/**
 * Created by PhpStorm.
 * User: Arash
 * Date: 12/16/2021
 * Time: 2:06 PM
 */


?>


@component('adminn.layouts.content')


    @slot('script')
        <script src="/js/ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'text' );
        </script>
        @endslot

    @slot('breadcrumb')



        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="javascript:void(0)">Articles</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Article</a></li>
            </ol>
        </div>


    @endslot


    <div class="row">


        <div class="col-lg-12">


            <div class="card">
                @include('error')
                <div class="card-header">
                    <h4 class="card-title">Edit Article {{$article['id']}}</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form method="post" action="{{route('articles.update',['article'=>$article['id']])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{$article['title']}}">
                                </div>
                            </div>
                            <div class="form-row">


                                <div class="form-group col-md-6">
                                    <label for="smallimage">Small Image</label>
                                    <div class="input-group">
                                        <input type="text" id="smallimage" class="form-control" name="smallimage"
                                               aria-label="Image" aria-describedby="button-image">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="button-image1">Select</button>
                                        </div>

                                    </div>
                                    <br>
                                    <input class="form-control" type="text" disabled value="{{$article['smallimage']}}">
                                    <br>

                                    <img class="w-25" src="{{$article['smallimage']}}">

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="bigimage">Big Image</label>
                                    <div class="input-group">
                                        <input type="text" id="bigimage" class="form-control" name="bigimage"
                                               aria-label="Image" aria-describedby="button-image">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="button-image2">Select</button>
                                        </div>
                                    </div>
                                    <br>
                                    <input class="form-control" type="text" disabled value="{{$article['bigimage']}}">
                                    <br>
                                    <img class="w-25" src="{{$article['bigimage']}}">


                                </div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {

                                        document.getElementById('button-image1').addEventListener('click', (event) => {
                                            event.preventDefault();

                                            inputId = 'smallimage';

                                            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
                                        });

                                        // second button
                                        document.getElementById('button-image2').addEventListener('click', (event) => {
                                            event.preventDefault();

                                            inputId = 'bigimage';

                                            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
                                        });
                                    });

                                    // input
                                    let inputId = '';

                                    // set file link
                                    function fmSetLink($url) {
                                        document.getElementById(inputId).value = $url;
                                    }
                                </script>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-12">

                                    <label for="text">Text</label>


                                    <textarea class="form-control" rows="4" id="text" name="text">
{!! $article['text'] !!}

                                    </textarea>



                                </div>

                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    @if($article->published())
                                        <input  checked class="form-check-input " id="published" type="checkbox" name="published">
                                        <label for="published" class="form-check-label">
                                            published
                                        </label>
                                        @else
                                        <input class="form-check-input" id="published" type="checkbox" name="published">
                                        <label for="published" class="form-check-label">
                                            published
                                        </label>
                                        @endif

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>

    </div>



@endcomponent
