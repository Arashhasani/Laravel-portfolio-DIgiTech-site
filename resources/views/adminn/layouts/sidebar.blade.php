<?php
/**
 * Created by PhpStorm.
 * User: Arash
 * Date: 12/16/2021
 * Time: 2:01 PM
 */


?>

<div class="deznav">
    <div class="deznav-scroll">
        {{--<a href="javascript:void(0)" class="add-menu-sidebar" data-toggle="modal" data-target="#addOrderModalside" >+ New Event</a>--}}
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>

                </a>
                <ul aria-expanded="false">
                    <li class="{{isActive('adminindex')}}"><a class="{{isActive('adminindex')}}" href="{{route('adminindex')}}">Dashboard</a></li>
                </ul>
            </li>




            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-newspaper"></i>
                    <span class="nav-text">Articles</span>

                </a>
                <ul aria-expanded="false">
                    <li class="{{isActive('articles.create')}}"><a class="{{isActive('articles.create')}}" href="{{route('articles.create')}}">Add new Article</a></li>
                    <li class="{{isActive(['articles.index','articles.edit'])}}"><a class="{{isActive('articles.index')}}" href="{{route('articles.index')}}">All Articles</a></li>
                </ul>
            </li>




            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-user"></i>
                    <span class="nav-text">Users</span>

                </a>
                <ul aria-expanded="false">
                    <li class="{{isActive('users.create')}}"><a class="{{isActive('users.create')}}" href="{{route('users.create')}}">Add new User</a></li>
                    <li class="{{isActive(['users.index','users.edit'])}}"><a class="{{isActive('users.index')}}" href="{{route('users.index')}}">All Users</a></li>
                </ul>
            </li>



            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-speaker"></i>
                    <span class="nav-text">Comments</span>

                </a>
                <ul aria-expanded="false">

                    <li class="{{isActive('comments.index')}}"><a class="{{isActive('comments.index')}}" href="{{route('comments.index')}}">All Comments</a></li>
                </ul>
            </li>


            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-user-4"></i>
                    <span class="nav-text">Profile</span>

                </a>
                <form method="post" action="{{route('logout')}}" id="logoutform">@csrf</form>
                <ul aria-expanded="false">

                    <li ><a  href="#" onclick="event.preventDefault();document.getElementById('logoutform').submit()">Logout</a></li>
                </ul>
            </li>









        </ul>
        <div class="copyright">
            <p><strong>Copy Right</strong> © 2021 All Rights Reserved</p>
        </div>
    </div>
</div>
