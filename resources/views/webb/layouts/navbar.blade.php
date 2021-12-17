<?php
/**
 * Created by PhpStorm.
 * User: Arash
 * Date: 12/16/2021
 * Time: 11:39 AM
 */


?>

<div class="search-section">
    <div class="wrap">
        <div class="wrap_float">

            <div class="search-form">
                <script>
                    function replace() {
                        document.getElementById('search').value=document.getElementById('searchbox').value;
                        document.getElementById('searchform').submit();
                    }
                </script>
                <form method="get" action="{{route('articles')}}" id="searchform">
                    <input type="hidden" name="search" id="search">
                </form>
                <input type="text" id="searchbox" class="search-input" placeholder="Search…">
                <button onclick="replace()" class="search-submit"></button>
            </div>
            <div class="search-close" id="search-close"></div>
        </div>
    </div>
</div>
<div class="container page">
    <div class="container-wrap">
        <div class="mobile-panel">
            <div class="wrap">
                <div class="wrap_float">
                    <div class="mobile-btn" id="js-menu-open">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <a class="logo" href="/">
                        DiGiTech
                    </a>
                    <div class="search-button"></div>
                </div>
            </div>
        </div>
        <div class="container-wrap--dummy"></div>
        <div class="top-panel" id="js-panel">
            <div class="wrap">
                <div class="wrap_float">
                    <div class="mode-check">
                        <input type="checkbox" id="mode-checkbox" class="mode-checkbox-input">
                        <label for="mode-checkbox" class="mode-checkbox-label" data-dark-title="Dark Mode" data-light-title="Light Mode"></label>
                    </div>
                    <div class="wrap-center">
                        <a href="/" class="logo">
                            DiGiTech
                        </a>
                        <div class="menu" id="js-menu">
                            <ul>
                                <li>
                                    <a href="{{route('index')}}">Home</a>

                                </li>

                                <li>
                                    <a href="{{route('articles')}}">Articles</a>

                                </li>
                                <li>
                                    <a href="#">About</a>

                                </li>
                                <li>
                                    <a href="#">Contact</a>

                                </li>


                            </ul>
                            <ul>
                              @guest()
                                    <form method="get" action="{{route('adminindex')}}" id="loginform"></form>
                                    <li class="login-li"><a onclick="event.preventDefault();document.getElementById('loginform').submit()" data-href="#" class="login-link getModal">Login</a></li>
                                  @endguest

                                @auth()
                                      <form method="get" action="{{route('adminindex')}}" id="loginform"></form>
                                      <li class="login-li"><a onclick="event.preventDefault();document.getElementById('loginform').submit()" data-href="#" class="login-link getModal">Profle</a></li>
                                    @endauth

                            </ul>
                        </div>
                    </div>
                    <div class="search-button" id="btn-search"></div>
                </div>
                <div class="socials">
                    <a class="soc-link">
                        <img src="/webb/img/facebook-icon.svg" class="img-svg" alt="">
                    </a>
                    <a class="soc-link">
                        <img src="/webb/img/twitter-soc-icon.svg" class="img-svg" alt="">
                    </a>
                    <a class="soc-link">
                        <img src="/webb/img/behance-icon.svg" class="img-svg" alt="">
                    </a>
                </div>
                <div class="menu-close" id="js-menu-close"></div>
            </div>
        </div>


