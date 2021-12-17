<?php
/**
 * Created by PhpStorm.
 * User: Arash
 * Date: 12/16/2021
 * Time: 11:34 AM
 */


?>

        <!DOCTYPE html>
<html lang="en">

<head>
    {!! SEO::generate() !!}

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/webb/css/styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/webb/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/webb/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/webb/img/favicons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/webb/img/favicons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/webb/img/favicons/android-chrome-512x512.png">
    <link rel="icon" type="image/png" href="/webb/img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" sizes="16x16" href="/webb/img/favicons/favicon.ico">
</head>

<body class="transition-none">
@include('webb.layouts.navbar')


@yield('layoutclass')

    @yield('content')

    @yield('sidebar')
</div>
@include('webb.layouts.footer')



<div style="display: none;">
    <div class="modal modal_default modal_login" id="modal-login">
        <div class="modal_wrap">
            <h2 class="title">Sign in</h2>
            <div class="modal-form">
                <div class="input-wrap white-label">
                    <input type="email" class="input" placeholder="Email" required>
                </div>
                <div class="input-wrap white-label password-field">
                    <input type="password" class="input password-input" placeholder="Password">
                    <button class="show-password-btn"></button>
                </div>
                <div class="agreement">
                    <input type="checkbox" class="agreement-checkbox" id="remember-1">
                    <label for="remember-1" class="agreement-label">
                            <span>
                                Remember me
                            </span>
                    </label>
                </div>
                <button class="btn submit-btn">
                    <span>Login</span>
                </button>
                <div class="authorization-socials">
                    <div class="authorization-socials-variants">
                        <div class="socials">
                            <div class="soc-link">
                                <img src="/webb/img/facebook-icon.svg" class="img-svg" alt="">
                            </div>
                            <div class="soc-link">
                                <img src="/webb/img/twitter-soc-icon.svg" class="img-svg" alt="">
                            </div>
                            <div class="soc-link">
                                <img src="/webb/img/behance-icon.svg" class="img-svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-info">
                <p><a href="#">Forgot password?</a></p>
                <p>Don’t have an account? <a data-href="#modal-registration" class="getModal">Create your own right
                        now.</a></p>
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>

<div style="display: none;">
    <div class="modal modal_default modal_registration" id="modal-registration">
        <div class="modal_wrap">
            <h2 class="title">Sign up</h2>
            <div class="modal-form">
                <div class="input-wrap white-label">
                    <input type="text" class="input" placeholder="Email">
                </div>
                <div class="input-wrap white-label password-field">
                    <input type="password" class="input password-input" placeholder="Password">
                    <button class="show-password-btn"></button>
                </div>
                <div class="agreement">
                    <input type="checkbox" class="agreement-checkbox" id="agree-1">
                    <label for="agree-1" class="agreement-label">
                            <span>
                                I accept the conditions of transmitting information
                            </span>
                    </label>
                </div>
                <button class="btn submit-btn">
                    <span>Sign up</span>
                </button>
                <div class="authorization-socials">
                    <div class="authorization-socials-variants">
                        <div class="socials">
                            <div class="soc-link">
                                <img src="/webb/img/facebook-icon.svg" class="img-svg" alt="">
                            </div>
                            <div class="soc-link">
                                <img src="/webb/img/twitter-soc-icon.svg" class="img-svg" alt="">
                            </div>
                            <div class="soc-link">
                                <img src="/webb/img/behance-icon.svg" class="img-svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-info">
                <p>Have an account? <a href="#modal-login" class="getModal">Sign in your right now.</a></p>
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>


<div style="display: none;">
    <div class="modal modal_default modal_reset" id="modal-reset-password">
        <div class="modal_wrap">
            <h2 class="title">Forgot password?</h2>
            <div class="subtitle">
                Use the e-mail and password that you specified when registering on the site
            </div>
            <div class="modal-form">
                <div class="input-wrap white-label">
                    <input type="text" class="input" placeholder="Email">
                </div>
                <button class="btn submit-btn">
                    <span>Reset Password</span>
                </button>
            </div>
            <div class="modal-info">
                <p>Don’t have an account? <a data-href="#modal-registration" class="getModal">Create your own right
                        now.</a></p>
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>

<div style="display: none;">
    <div class="modal modal_default modal_success" id="modal-reset-password-success">
        <div class="modal_wrap">
            <div class="success-icon"></div>
            <h2 class="title">Success</h2>
            <div class="subtitle">
                Your message was successfully sent. We will contact you shortly
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>

<div style="display: none;">
    <div class="modal modal_default modal_order" id="book-now">
        <div class="modal_wrap">
            <h2 class="title">Please fill in this quick form</h2>
            <div class="subtitle">
                Your personal travel expert will get back to you in a few hours to introduce themselves and start
                planning an exceptional holiday experience with you.
            </div>
            <div class="modal-form">
                <div class="input-wrap date-wrap white-label">
                    <input type="text" class="input js_calendar" placeholder="When would you like to travel?" readonly>
                </div>
                <div class="input-wrap date-wrap white-label">
                    <input type="text" class="input js_calendar" placeholder="When do you plan to come back?" readonly>
                </div>
                <div class="input-wrap white-label">
                    <input type="text" class="input" placeholder="Name">
                </div>
                <div class="input-wrap white-label">
                    <input type="text" class="input" placeholder="Surname">
                </div>
                <div class="input-wrap white-label">
                    <input type="tel" class="input js-tel" placeholder="Contact Number">
                </div>
                <div class="input-wrap white-label">
                    <input type="email" class="input" placeholder="Email Address">
                </div>
                <div class="input-wrap white-label fullwidth">
                    <textarea class="input textarea" placeholder="More details about your trip"></textarea>
                </div>
                <div class="agreement">
                    <input type="checkbox" class="agreement-checkbox" id="agree-1b">
                    <label for="agree-1b" class="agreement-label">
                            <span>
                                I accept the conditions of transmitting information
                            </span>
                    </label>
                </div>
                <button class="btn submit-btn">
                    <span>Submit</span>
                </button>
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>

<div style="display: none;">
    <div class="modal modal_default modal_order" id="ask-question">
        <div class="modal_wrap">
            <h2 class="title">Ask a question</h2>
            <div class="subtitle">
                Please fill out the form and our manager will contact you
            </div>
            <div class="modal-form">
                <div class="input-wrap white-label">
                    <input type="text" class="input" placeholder="Name">
                </div>
                <div class="input-wrap white-label">
                    <input type="text" class="input" placeholder="Last name">
                </div>
                <div class="input-wrap white-label">
                    <input type="text" class="input" placeholder="Contact Number">
                </div>
                <div class="input-wrap white-label">
                    <input type="text" class="input" placeholder="Email Address">
                </div>
                <div class="input-wrap white-label fullwidth">
                    <textarea class="input textarea" placeholder="Your question"></textarea>
                </div>
                <div class="agreement">
                    <input type="checkbox" class="agreement-checkbox" id="agree-1c">
                    <label for="agree-1c" class="agreement-label">
                            <span>
                                I accept the conditions of transmitting information
                            </span>
                    </label>
                </div>
                <button class="btn submit-btn">
                    <span>Submit</span>
                </button>
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>


<div class="bottom-message success-message" id="success-message">
        <span>
            Thanks! Your subscription <br>has been successfully issued
        </span>
</div>

<div class="bottom-message error-message" id="error-message">
        <span>
            Error occurred
        </span>
</div>
<script src="/webb/js/jquery.min.js"></script>
<script src="/webb/js/checkmode.js"></script>
<script src="/webb/js/slick.min.js"></script>
<script src="/webb/js/jquery.arcticmodal.min.js"></script>
<script src="/webb/js/lightgallery.js"></script>
<script src="/webb/js/jquery.mousewheel.min.js"></script>
<script src="/webb/js/device.min.js"></script>
<script src="/webb/js/jquery.placeholder.label.js"></script>
<script src="/webb/js/jquery-ui.min.js"></script>
<script src="/webb/js/scripts.js"></script>

@yield('script')
</body>

</html>

