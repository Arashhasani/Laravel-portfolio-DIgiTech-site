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
                    <a href="index.html">Home</a> / <a href="#">Articles</a> / <span class="current">{{$article['title']}}</span>
                </div>
            </div>
        </div>

        @endslot









    <div class="page-wrap-content">
       
        <div class="post-single-wrap sticky-parent">
            <div class="share-block">
                <div class="share-block-main js-share-block-main">
                    <div class="socials">
                        <a class="soc-link" data-title="Facebook">
                                        <span class="soc-icon">
                                            <img src="/webb/img/facebook-icon.svg" class="img-svg" alt="">
                                        </span>
                        </a>
                        <a class="soc-link" data-title="Twitter">
                                        <span class="soc-icon">
                                            <img src="/webb/img/twitter-soc-icon.svg" class="img-svg" alt="">
                                        </span>
                        </a>
                        <a class="soc-link" data-title="Pinterest">
                                        <span class="soc-icon">
                                            <img src="/webb/img/pinterest-icon.svg" class="img-svg" alt="">
                                        </span>
                        </a>
                        <a class="soc-link" data-title="Behance">
                                        <span class="soc-icon">
                                            <img src="/webb/img/behance-icon.svg" class="img-svg" alt="">
                                        </span>
                        </a>
                        <div class="soc-link show-more-socials" style="display: none;"></div>
                    </div>
                    <div class="share-block-item js-anchor link-to-comments" data-href="#comments-section">
                        <div class="comments-count">
                            <span>{{count($article->comments)}}</span>
                        </div>
                    </div>
                </div>
                <div class="share-block-item mobile-item js-mobile-share-show mobile-share-show-btn">
                    <div class="show-mobile-icon"></div>
                </div>
                <div class="share-block-item add-to-favorites">
                    <div class="favorites-tag js-add-to-fav">
                        <i class="is-added bouncy"></i>
                        <i class="not-added bouncy"></i>
                        <span class="fav-overlay"></span>
                    </div>
                </div>
            </div>
            <div class="single-header">
                <div class="wrap wrap-center">
                    <div class="wrap_float">

                        <h1 class="page-title">
                            {{$article['title']}}
                        </h1>
                        <div class="post-info">
                            <div class="post-author post-info-author">
                                <div class="author-image">
                                    <img src="/webb/img/author.jpg" alt="" class="image-cover">
                                </div>
                                <span>{{$article->user->name ?? '-'}}</span>
                            </div>
                            <div class="post-date post-info-date">
                                {{date_format($article['created_at'],'M d,Y')}}
                            </div>
                            <div class="post-views post-info-views">
                                {{$article['count_view']}}
                            </div>
                        </div>

                        <div class="post-image-large wide">
                            <img src="{{$article['bigimage']}}" alt="">
                            <span class="caption-text">Photo caption</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-content wp-content">
                <div class="wrap wrap-center">
                    <div class="wrap_float">

                        <p>
                            {!! $article['text'] !!}
                        </p>

                    </div>
                </div>
            </div>
        </div>

        <div class="comments-section" id="comments-section">
            <div class="wrap wrap-center">
                <div class="wrap_float">
                    <h2 class="title">Comments <span class="comments-count">{{count($article->comments)}}</span></h2>
                    @auth()


                        <div class="comments-form">
                            @include('error')
                            <form method="post" action="{{route('addcomment')}}">
                                @csrf


                                <div class="input-wrap textarea-wrap white-label comment-field">
                                    <textarea name="comment" class="input textarea" placeholder="Write a comment"></textarea>
                                </div>
                                <div class="input-wrap white-label name-field">
                                    <input value="{{get_class($article)}}"  name="commentable_type" type="hidden"  >
                                    <input value="{{$article['id']}}"  name="commentable_id" type="hidden" >
                                    <input value="{{auth()->user()->name ?? '-'}}" name="name" type="text" class="input" placeholder="Name*" disabled>
                                </div>
                                <div class="input-wrap white-label email-field">
                                    <input value="{{auth()->user()->email ?? '-'}}"  name="email" type="text" class="input" placeholder="Email*" disabled>
                                </div>



                                <button type="submit" class="btn submit submit-btn">
                                    <span>Post Comment</span>
                                </button>
                            </form>
                        </div>


                        @endauth

                    @guest()

                        <div class="comments-list-item">

                        <div class="comment-item">

                            <div class="comment-item-text">
                                Login to Post a Comment
                            </div>
                            <br>
                            <br>
                           <a class="btn  btn-sm btn-primary" href="{{route('login')}}">login</a>
                        </div>
                        </div>





                    @endguest

                    <div class="comments-list">
                        @foreach($article->comments()->get() as $comment)
                        <div class="comments-list-item">



                            <div class="comment-item">
                                <div class="comment-item-userpic">
                                    <img src="/webb/img/man.jpg" alt="" class="image-cover">
                                </div>
                                <div class="comment-item-name">{{$comment->user->name}}</div>
                                <div class="comment-item-date"> {{date_format($comment['created_at'],'M d,Y')}}</div>
                                <div class="comment-item-text">
                                    {{$comment['comment']}}
                                </div>
                                <div class="reply-link">Reply</div>
                            </div>



                            {{--<div class="comment-item reply">--}}
                                {{--<div class="comment-item-userpic">--}}
                                    {{--<img src="/webb/img/author.jpg" alt="" class="image-cover">--}}
                                {{--</div>--}}
                                {{--<div class="comment-item-name">Maya Delia</div>--}}
                                {{--<div class="comment-item-date">17.04.20, 15:30</div>--}}
                                {{--<div class="comment-item-reply-for">Responded to the user: Victor Shibut</div>--}}
                                {{--<div class="comment-item-text">--}}
                                    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas nesciunt quam quasi praesentium perferendis voluptates, pariatur sit, officiis cum debitis non quos facilis, unde? Soluta tempora itaque qui, pariatur quo reiciendis rem quia. Rerum, recusandae, eveniet. Sunt molestiae, temporibus nemo.--}}
                                {{--</div>--}}
                                {{--<div class="reply-link">Reply</div>--}}
                            {{--</div>--}}






                        </div>
                        @endforeach


                    </div>

                </div>
            </div>
            @slot('side')
                @include('webb.layouts.sidebar')

            @endslot
        </div>
    </div>

    
    
    
    
    
    
    
    


    @endcomponent

