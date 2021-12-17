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
        <div class="page-wrap archive-page with-sidebar">
            @endslot
            @slot('breadcrumb')


                <div class="breadcrumbs">
                    <div class="wrap wrap-center">
                        <div class="wrap_float">
                            <a href="index.html">Home</a> /
                            {{--<a href="index.html">Home</a> / <a href="#">Features</a> / <span class="current">Archive Two Columns Right Sidebar</span>--}}
                        </div>
                    </div>
                </div>

            @endslot


            <div class="archive-header">
                <div class="wrap wrap-center">
                    <div class="wrap_float">
                        <div class="title-wrap">
                            <h1 class="page-title">DiGiTech Latest News Ablout Technology</h1>
                            <div class="posts-count">
                                {{count(\App\Models\Article::all())}} Posts
                            </div>
                        </div>
                        <div class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum voluptas, sit itaque
                            inventore officiis vero officia omnis autem quo dolorem pariatur, totam neque dolore velit
                            veritatis, eius molestiae sunt aut.
                        </div>

                    </div>
                </div>
            </div>


            <div class="archive-body">
                <div class="wrap">
                    <div class="page-wrap-content">
                        <div class="post-items-list posts-two-columns">


                            @foreach($articles as $article)



                                <a href="{{route('articledetail',['articleSlug'=>$article['slug']])}}"
                                   class="post-item">
                                    <img src="{{$article['smallimage']}}" alt="" class="post-bg-img">

                                    <h3 class="post-title">
                                        {{$article['title']}}
                                    </h3>
                                    <div class="post-info">
                                        <div class="post-author post-info-author">
                                            <div class="author-image">
                                                <img src="/webb/img/author.jpg" alt="" class="image-cover">
                                            </div>
                                            <span>Maya Delia</span>
                                        </div>
                                        <div class="post-date post-info-date">
                                            {{date_format($article['created_at'],'M d,Y')}}
                                            <span>Posted By : {{$article->user->name ?? '-'}}</span>
                                        </div>
                                        <div class="post-views post-info-views">
                                            {{$article['count_view']}}

                                        </div>
                                    </div>
                                </a>

                            @endforeach

                            {{--<a href="single.html" class="post-item">--}}
                            {{--<img src="/webb/img/post-9-img.jpg" alt="" class="post-bg-img">--}}
                            {{--<div class="post-tags">--}}
                            {{--<div class="tag">Mobile</div>--}}
                            {{--<div class="tag">APP</div>--}}
                            {{--</div>--}}
                            {{--<h3 class="post-title">--}}
                            {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero error nostrum minus!--}}
                            {{--</h3>--}}
                            {{--<div class="post-info">--}}
                            {{--<div class="post-author post-info-author">--}}
                            {{--<div class="author-image">--}}
                            {{--<img src="/webb/img/author.jpg" alt="" class="image-cover">--}}
                            {{--</div>--}}
                            {{--<span>Maya Delia</span>--}}
                            {{--</div>--}}
                            {{--<div class="post-date post-info-date">--}}
                            {{--18 May 2021--}}
                            {{--</div>--}}
                            {{--<div class="post-views post-info-views">--}}
                            {{--3457--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</a>--}}


                        </div>
                        <div class="show-more">
                            <a href="{{route('articles')}}">
                            <div class="show-more-btn">
                               <span>Show more</span>
                            </div>
                            </a>

                        </div>
                        {{$articles->render()}}

                    </div>


                    @slot('side')
                        @include('webb.layouts.sidebar')

                    @endslot


                </div>
            </div>



        @endcomponent

