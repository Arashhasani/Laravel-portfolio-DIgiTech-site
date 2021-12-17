<?php
/**
 * Created by PhpStorm.
 * User: Arash
 * Date: 12/16/2021
 * Time: 11:41 AM
 */


?>

<div class="page-wrap-sidebar">
    <div class="sidebar">

        <div class="sidebar-item popular-posts">
            <h3 class="sidebar-item-title">Popular Post</h3>
            <div class="popular-posts-wrap">


                @foreach(\App\Models\Article::query()->orderBy('count_view','desc')->limit(3)->get() as $article)

                    <a href="{{route('articledetail',['articleSlug'=>$article['slug']])}}" class="post-item popular-posts-item">
                        <img src="{{$article['smallimage']}}" alt="" class="post-bg-img">

                        <div class="post-title">
                            {{$article['title']}}
                        </div>
                        <div class="post-info">
                            <div class="post-author post-info-author">
                                <div class="author-image">
                                    <img src="{{$article['smallimage']}}" alt="" class="image-cover">
                                </div>
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




                {{--<a href="single.html" class="post-item popular-posts-item">--}}
                    {{--<img src="/webb/img/post-2-img.jpg" alt="" class="post-bg-img">--}}
                    {{--<div class="post-tags">--}}
                        {{--<div class="tag">Mobile</div>--}}
                        {{--<div class="tag">APP</div>--}}
                    {{--</div>--}}
                    {{--<div class="post-title">--}}
                        {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab saepe soluta porro.--}}
                    {{--</div>--}}
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
        </div>



        <div class="sidebar-item widget_pages">
            <div class="sidebar-item-title">Pages</div>
            <ul>

                <li class="page_item page-item-1862"><a href="#">Single Page</a></li>
                <li class="page_item page-item-1862"><a href="#">Contact Page</a></li>
                <li class="page_item page-item-701"><a href="#">Subscribe Page</a></li>
                <li class="page_item page-item-146"><a href="#">Author Page</a></li>
            </ul>
        </div>
    </div>
</div>
