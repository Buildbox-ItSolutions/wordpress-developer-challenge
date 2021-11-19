<?php

//custom admin login logo
  function custom_login_logo() {
    echo '<style type="text/css">
           h1 a
           {
                background-image: url(' .get_bloginfo('template_directory').'/assets/img/logo.png) !important;
                width: 193px !important;
                height: 100px !important;
                background-size: 133px !important;
                background-position: center !important;
            }
           body.login
           {
            background: #000;
            background-size: cover;
            }
            .wp-core-ui .button-primary{
                background: #263441;
                border-color:#263441;
                float: none !important;
                width: 100%;
                margin-top: 22px;
                box-shadow:none !important;
                height: 55px;
                border-radius: 0;
            }
            .login form .input:focus{
                border-color: #213e58;
                box-shadow: 0 0 0 1px #213e58;
            }
            .dashicons-visibility:before{
                color: #737373;
            }
            .wp-core-ui .button-primary:hover,
            .wp-core-ui .button-primary:focus,
            .wp-core-ui .button-primary:active{
                background: #213e58;
                border-color: #213e58;
            }
          </style>';
  }
  add_action('login_head', 'custom_login_logo');
