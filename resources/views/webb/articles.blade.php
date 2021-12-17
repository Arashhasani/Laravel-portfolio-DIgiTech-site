<?php
/**
 * Created by PhpStorm.
 * User: Arash
 * Date: 12/16/2021
 * Time: 11:46 AM
 */


?>


@component('webb.layouts.content')
    @slot('layoutclass')
        <div class="page-wrap archive-page ">
            @endslot
    @slot('breadcrumb')




        <div class="breadcrumbs">
            <div class="wrap wrap-center">
                <div class="wrap_float">
                    <a href="index.html">Home</a> / <a href="#" class="current">Articles</a> / 
                </div>
            </div>
        </div>

        @endslot









    <div class="page-wrap archive-page">
      
        <div class="archive-header">
            <div class="wrap wrap-center">
                <div class="wrap_float">
                    <div class="title-wrap">
                        <h1 class="page-title">Latest Articles</h1>
                        <div class="posts-count">
                            {{count(\App\Models\Article::all())}} Posts
                        </div>
                    </div>
                    <div class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, ea assumenda excepturi a nemo quam eveniet suscipit magnam id reiciendis placeat. Tempora culpa beatae quidem, at iste, illo et fugit!
                    </div>

                </div>
            </div>
        </div>
        <div class="archive-body">
            <div class="wrap">
                <div class="page-wrap-content">
                    <div class="post-items-list posts-two-columns">



                        @foreach($articles as $article)



                            <a href="{{route('articledetail',['articleSlug'=>$article['slug']])}}" class="post-item">
                                <img src="{{$article['smallimage']}}" alt="" class="post-bg-img">

                                <h3 class="post-title">
                                    {{$article['title']}}
                                </h3>
                                <div class="post-info">
                                    <div class="post-author post-info-author">
                                        <div class="author-image">
                                            <img src="/webb/img/author.jpg" alt="" class="image-cover">
                                        </div>

                                    </div>
                                    <div class="post-date post-info-date">
                                        {{date_format($article['created_at'],'M d,Y')}}

                                        <span>Posted By : {{$article->user->name}}</span>

                                    </div>
                                    <div class="post-views post-info-views">
                                        {{$article['count_view']}}

                                    </div>
                                </div>
                            </a>


                            @endforeach

                    </div>

                    {{$articles->render()}}

                </div>

            </div>

        </div>

    
    
    
    
    
    
    
    


    @endcomponent

