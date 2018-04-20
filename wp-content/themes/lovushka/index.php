<!DOCTYPE html>
<html id="html" lang="en"> 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  <title><?php wp_title(''); ?></title>
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
<?php wp_head(); ?>
<?php if(is_user_logged_in()){ ?>
  <?php if(!current_user_can('administrator')){ ?>
    <style>
      #wpadminbar
      {
        display: none;
      }
      html.mdl-js#html
      {
        margin-top: 0!important;
        padding-top: 0!important; 
      }

      html { margin-top: 0 !important; }
      * html body { margin-top: 0 !important; }
      @media screen and ( max-width: 782px ) {
        html { margin-top: 0 !important; }
        * html body { margin-top: 0 !important; }
      }

    </style>
  <?php } ?>
<?php } ?>
</head>
<body>
  
  <!-- ====================================================
  header section -->
  <header class="top-header">
    <div class="container">
      <div class="row">
        <div class="header_area col-md-12">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
              <a href="/" class="logo"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header> 
  <!-- end of header area -->
  <section class="lovushka text-center" id="lovushka">
    <?php if(is_user_logged_in()){ ?>
      <!-- Если зашел подписчик -->
      <?php if(current_user_can('subscriber')){ ?>
        <div class="container vitrin_wrap">
          <div class="col-md-12">
            <h1 class="vitrin_heading">Anti-stress Wizard Lovushka</h1>
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="vitrin">
                  <p><h3>Good day!</h3></p>
                  <p>
                    In order to get rid of anger, irritation and other annoying thoughts, we often have to look for "free ears" and pour out their concerns in them. We decided to make a program that would cope with this task and was at hand 24 hours a day.
                  </p>
                  <p>
                    December 20, 2017 program <b>"Anti-stress Wizard Lovushka"</b> became available to users. We thought of the most convenient and simple interface. They are equally convenient to use on a computer, laptop, tablet and even on a smartphone. So, at any time you can use the trap directly from your smartphone's screen, for this you need only the Internet and access to <b>"Anti-stress Wizard Lovushka"</b>.
                  </p>
                  <p>
                    <img src="<?php bloginfo('template_url'); ?>/img/items.png" alt="lovushka_items" class="items">
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <h2>We offer 2 options for using the program</h2>
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-5">
                <div class="vitrin">
                  <h3>Basic option</h3>
                  <p class="vitrin_content">In the basic mode of the program <b>"Anti-stress Wizard Lovushka"</b> the user has access to fast protocols ("I'm Afraid", "I'm angry", "I'm offended," "I doubt"). These protocols allow one "click", in 4 minutes, to get rid of the experience. In this mode, it is possible to manually control the speed of rotation of the trap. The time of the trap operation with manual control is at the discretion of the user.</p>
                  <h4>Cost of the basic version</h4>
                  <div class="price">5500 rur./year.</div>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="vitrin">
                  <h3>Extended version</h3>
                  <p class="vitrin_content">Extended program mode <b>"Anti-stress Wizard Lovushka"</b> includes all the features of the basic mode, as well as a mechanism for the "Revision of personal history." In this mode, you can select up to 2 relevant problems from the list and follow the prompts of the program to conduct a deep study of your personal history. In this mode, the speed of rotation of the louver is controlled by the program.</p>
                  <h4>Cost of the expanded version</h4>
                  <div class="price">10000 rur./year.</div>
                </div>
              </div>
              <div class="col-sm-1"></div>
            </div>
          </div>
          <div class="col-md-12">
            <h2>How can I get access to the program?</h2>
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="vitrin">
                  In order to gain access to the program, write to <a href="mailto:info@chikurov.com">info@chikurov.com</a> indicating in the letter which variant of the work you choose.
                  <h3></h3>
                  <h4>Legal information:</h4>
                  <p><a href="mailto:info@chikurov.com">info@chikurov.com</a> / +7 (495) 135-25-48</p>
                  <p>OGRNIP: 314910224600336</p>
                  <p>INN: 7706092528</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- Если зашел участник или администратор -->
      <?php } elseif(current_user_can('contributor') || current_user_can('administrator') || current_user_can('author')) { ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="reg_block">
          <?php 
            $user = get_current_user_id();
            $cur_user_data = get_userdata($user);
            $user_reg = $cur_user_data->get('user_registered');
            $user_login = $cur_user_data->get('user_login');
            $user_mail = $cur_user_data->get('user_email');
            $year_val = 31536000;
            $regtime = strtotime($user_reg);
            $cur_data = time();
            $ratio =($cur_data - $regtime) - $year_val;
            $ratioten = ($cur_data - $regtime) - $year_val + 864000;
          ?>
          <?php if ($ratioten > 0) { ?>
            <div class="ratioten" data-ratio="<?php echo $ratioten;?>"></div>
            <div class="container">
              <div class="row">
                <div class="col-xs-6 col-xs-offset-3 ru_block">
                  <h3>The license has expired</h3>
                  <p>To renew the license, write to <a href="mailto:info@chikurov.com">info@chikurov.com</a></p>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 ring">
                  <!-- <img src="img/lovushka.png" alt="lovushka" class="protocol"> -->
                  <div class="protocol">
                    <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                       width="612px" height="792px" viewBox="0 0 612 792" enable-background="new 0 0 612 792" xml:space="preserve">
                    <g>
                      <g>
                        <path fill="#D6AC3B" d="M472.7,366.872c-0.217-10.506,3.621-19.459,10.95-26.804c6.811-6.826,14.083-6.128,18.936,1.99
                          c2.344,3.921,3.69,8.485,5.123,12.877c0.408,1.249-0.465,2.916-0.75,4.391c-1.137-1.072-2.678-1.943-3.333-3.255
                          c-1.754-3.516-2.807-7.401-4.722-10.813c-3.704-6.601-6.971-7.046-12.476-1.827c-8.746,8.292-10.951,18.892-8.986,30.179
                          c2.863,16.446,10.024,31.101,20.643,44.019c0.843,1.026,1.794,1.98,2.79,2.86c6.277,5.544,9.757,4.842,14.739-1.964
                          c5.85-7.992,11.955-15.826,18.391-23.352c3.902-4.562,9.211-6.857,15.512-6.373c2.453,0.188,4.959-0.389,7.424-0.271
                          c1.307,0.062,2.58,0.865,3.868,1.334c-1.11,1.045-2.108,2.799-3.351,2.995c-3.096,0.489-6.315,0.12-9.464,0.361
                          c-8.254,0.633-13.282,6.158-17.863,12.192c-3.994,5.261-7.773,10.684-11.755,15.954c-7.621,10.086-12.335,10.052-22.215-0.157
                          c-12.934-13.362-19.613-30.303-23.407-48.354C472.352,370.942,472.7,368.87,472.7,366.872z"/>
                        <path fill="#D6AE3F" d="M205.151,392.457c-1.358,2.397-2.527,4.929-4.119,7.158c-2.396,3.356-4.824,6.765-7.725,9.665
                          c-3.444,3.443-6.757,3.033-8.61-1.447c-3.406-8.234-6.329-16.693-8.999-25.201c-7.364-23.468-13.461-47.414-27.001-68.45
                          c-0.42-0.653,0.063-1.887,1.333-3.269c1.09,1.474,2.358,2.848,3.244,4.436c10.675,19.107,18.02,39.528,24.03,60.507
                          c2.508,8.755,5.538,17.367,8.578,25.957c0.665,1.879,2.383,3.385,3.617,5.063c1.578-1.345,3.554-2.426,4.655-4.087
                          c2.738-4.128,4.98-8.581,7.625-12.776c0.978-1.551,2.525-2.743,3.813-4.098c1.458,1.426,3.365,2.612,4.284,4.327
                          c2.323,4.332,4.203,8.902,6.26,13.377c0.522,0.059,1.043,0.117,1.565,0.176c1.529-4.176,3.057-8.353,4.587-12.529
                          c0.564-1.54,1.02-3.131,1.72-4.606c1.609-3.388,4.597-3.912,6.863-1.521c7.403,7.81,14.448,15.965,21.473,24.123
                          c0.546,0.634-0.135,2.326-0.245,3.526c-1.335-0.542-3.118-0.711-3.931-1.688c-5.189-6.234-10.118-12.684-15.243-18.972
                          c-1.22-1.497-2.862-2.649-4.819-4.421c-2.429,6.279-4.419,12.012-6.904,17.521c-0.839,1.86-2.932,3.155-4.451,4.708
                          c-1.361-1.49-3.097-2.782-4.008-4.51c-2.205-4.181-4.025-8.566-6-12.868C206.214,392.523,205.683,392.49,205.151,392.457z"/>
                        <path fill="#D6AF41" d="M146.083,382.646c-0.058-16.61-4.384-29.908-16.463-39.773c-1.765-1.442-4.807-3.021-6.47-2.406
                          c-1.646,0.609-2.782,3.812-3.255,6.064c-0.571,2.72-0.069,5.648-0.332,8.458c-0.086,0.922-1.108,1.756-1.702,2.63
                          c-0.867-0.798-2.571-1.729-2.469-2.374c0.886-5.607,1.355-11.462,3.446-16.638c1.647-4.078,6.246-4.155,10.204-1.154
                          c12.911,9.789,20.413,22.927,21.128,38.961c0.408,9.155-1.119,18.571-3.02,27.608c-2.235,10.622-10.694,15.468-20.284,5.593
                          c-3.824-3.937-7.694-7.875-11.896-11.391c-11.823-9.891-25.734-14.08-40.981-14.587c-1.435-0.048-2.813-1.78-4.218-2.731
                          c1.321-0.607,2.714-1.857,3.952-1.719c10.954,1.224,22.029,2.56,31.575,8.541c6.792,4.255,13.027,9.419,19.374,14.353
                          c2.87,2.231,5.268,5.07,8.135,7.306c3.213,2.506,6.096,2.089,8.199-1.748C145.553,399.339,145.67,390.234,146.083,382.646z"/>
                        <path fill="#D6AF42" d="M305.642,365.074c3.375-3.592,6.708-7.226,10.137-10.766c4.288-4.427,4.085-5.79-1.47-8.702
                          c-1.03-0.54-2.053-1.097-3.056-1.687c-5.471-3.217-5.926-6.739-1.389-10.985c2.871-2.688,5.793-5.321,9.216-8.459
                          c-3.183-2.311-5.91-4.1-8.421-6.153c-5.162-4.221-5.494-8.598,0.216-11.948c9.059-5.316,18.616-9.848,28.196-14.196
                          c13.507-6.131,27.219-11.812,40.868-17.628c1.468-0.626,3.098-0.873,4.653-1.295c0.28,0.607,0.56,1.214,0.84,1.821
                          c-2.103,1.21-4.106,2.656-6.324,3.594c-17.15,7.25-34.394,14.281-51.489,21.658c-5.009,2.162-9.808,4.95-14.377,7.948
                          c-3.924,2.575-3.683,4.853,0.14,7.656c1.737,1.273,3.518,2.488,5.305,3.691c4.04,2.722,4.427,5.291,1.023,8.934
                          c-2.038,2.181-4.4,4.06-6.609,6.082c-2.34,2.141-3.454,4.207,0.318,6.054c1.328,0.651,2.542,1.558,3.903,2.116
                          c5.881,2.411,7.089,5.201,3.621,10.199c-3.014,4.343-6.523,8.365-10.063,12.306c-0.88,0.98-2.723,1.096-4.124,1.609
                          C306.383,366.307,306.012,365.69,305.642,365.074z"/>
                        <path fill="#D6AD3C" d="M321.816,579.539c-4.664,1.978-5.249-2.526-5.295-4.616c-0.163-7.449-4.656-11.61-9.939-15.607
                          c-3.306-2.501-6.407-5.296-9.441-8.129c-3.064-2.861-3.136-6.418,0.443-8.343c5.292-2.847,10.96-5.302,16.755-6.847
                          c12.416-3.311,24.299-1.056,35.158,5.657c2.294,1.418,4.741,4.177,5.085,6.607c0.232,1.634-2.76,4.572-4.927,5.527
                          c-4.802,2.117-9.951,3.518-15.058,4.82c-1.109,0.283-2.637-1.077-3.972-1.68c1.133-0.871,2.14-2.112,3.421-2.547
                          c5.313-1.807,10.71-3.37,17.358-5.419c-6.256-6.49-12.608-8.948-19.216-9.72c-9.971-1.166-19.902-0.175-29.049,4.614
                          c-1.382,0.724-3.585,2.042-3.505,2.911c0.135,1.484,1.548,3.105,2.831,4.183c3.665,3.076,7.954,5.514,11.194,8.958
                          c2.614,2.778,4.406,6.509,5.916,10.09C320.808,572.92,321.084,576.247,321.816,579.539z"/>
                        <path fill="#D6AD3F" d="M327.671,219.294c2.266,11.826-1.395,22.006-9.531,30.724c-3.847,4.122-8.486,7.523-12.19,11.754
                          c-1.874,2.141-4.164,6.488-3.254,7.908c1.459,2.276,5.334,3.859,8.338,4.142c12.857,1.214,24.802-2.409,36.109-8.267
                          c2.327-1.205,4.463-2.903,6.401-4.685c1.1-1.011,1.618-2.654,2.398-4.013c-1.443-0.518-2.853-1.304-4.338-1.489
                          c-1.964-0.245-4.019,0.203-5.97-0.086c-1.102-0.164-2.073-1.209-3.103-1.858c1.072-0.765,2.123-2.141,3.221-2.179
                          c2.946-0.102,6.054-0.091,8.825,0.763c2.088,0.643,5.04,2.464,5.284,4.107c0.313,2.101-1.076,5.487-2.84,6.676
                          c-5.89,3.97-11.969,8.001-18.542,10.538c-9.921,3.829-20.304,6.567-31.161,3.547c-9.103-2.532-11.189-7.944-5.366-15.393
                          c3.337-4.267,7.471-7.954,11.491-11.635c7.78-7.124,11.671-15.826,11.565-26.376c-0.016-1.553,0.475-3.112,0.732-4.668
                          C326.384,218.968,327.028,219.131,327.671,219.294z"/>
                        <path fill="#D4AB38" d="M446.737,393.618c-10.677-1.312-21.4-2.34-32.013-4.052c-5.519-0.89-9.664-0.121-14.059,3.788
                          c-6.676,5.938-14.187,10.949-21.471,16.178c-0.846,0.608-2.497,0.095-3.775,0.102c0.249-1.164,0.089-2.859,0.808-3.413
                          c8.477-6.524,16.907-13.141,25.77-19.11c2.563-1.726,6.524-2.211,9.741-1.958c6.708,0.528,13.316,2.398,20.022,2.843
                          c7.319,0.485,14.704-0.118,22.057,0c1.341,0.021,2.663,1.223,3.993,1.879c-1.003,1.044-1.883,2.787-3.033,2.989
                          c-2.586,0.454-5.306,0.142-7.971,0.142C446.783,393.21,446.76,393.414,446.737,393.618z"/>
                        <path fill="#D7AE3F" d="M302.324,483.499c1.843-2.153,3.455-2.7,5.529-0.026c4.628,5.968,9.564,11.698,14.134,17.707
                          c0.991,1.302,1.307,3.361,1.36,5.09c0.206,6.638,0.297,13.287,0.132,19.924c-0.03,1.216-1.452,2.398-2.231,3.596
                          c-0.736-1.099-2.004-2.15-2.107-3.305c-0.309-3.456-0.677-7.042-0.095-10.417c1.633-9.472-2.802-16.506-8.489-23.166
                          C307.874,489.759,305.115,486.681,302.324,483.499z"/>
                      </g>
                    </g>
                    </svg>
                  </div>
                </div>
                <?php if(is_user_logged_in()){ ?>
                  <?php if(current_user_can('administrator') || current_user_can('author')){ ?>
                    <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 ru_block">
                      <div class="instruction_block hidden">
                        <span class="instr"></span>
                        <div>
                          <button type="button" class="btn btn-primary next_instr">Next <i class="fa fa-chevron-right"></i></button>
                          <button type="button" class="btn btn-primary hidden close_instr">Close</button>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                <?php } ?>
                <div class="col-md-4 col-md-offset-4 ru_block">
                  <div class="btn-group speed_control">
                    <button type="button" class="btn btn-default btn-lg speed_slover"><i class="fa fa-backward" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-default btn-lg disabled speed_closed hidden" data-toggle="tooltip" data-placement="top" title="In the current mode, the speed is automatically adjusted"><i class="fa fa-backward" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-default btn-lg play"><i class="fa fa-play" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-default btn-lg stop"><i class="fa fa-stop" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-default btn-lg disabled speed_closed hidden" data-toggle="tooltip" data-placement="top" title="In the current mode, the speed is automatically adjusted"><i class="fa fa-forward" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-default btn-lg speed_faster"><i class="fa fa-forward" aria-hidden="true"></i></button>
                  </div>
                </div>
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 ru_block">
                  <div class="btn-group easy_mode">
                    <button type="button" data-mode="scare" data-speed="2" class="btn btn-default easy_mode_item easy_mode_item_scare">I'm afraid</button>
                    <button type="button" data-mode="angry" data-speed="4" class="btn btn-default easy_mode_item easy_mode_item_angry">I'm angry</button>
                    <button type="button" data-mode="resentment" data-speed="6" class="btn btn-default easy_mode_item easy_mode_item_resentment">I'm offended</button>
                    <button type="button" data-mode="doubt" data-speed="8" class="btn btn-default easy_mode_item easy_mode_item_doubt">I doubt it</button>
                  </div>
                </div>
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 ru_block">
                  <div class="btn-group speed_control">
                    <button type="button" class="btn btn-default manual" data-toggle="modal" data-target="#manual"><i class="fa fa-file-text" aria-hidden="true"></i> Rules</button>
                  <?php if(is_user_logged_in()){ ?>
                    <?php if(current_user_can('administrator') || current_user_can('author')){ ?>
                      <button type="button" class="btn btn-default set" data-toggle="modal" data-target="#set"><i class="fa fa-sliders" aria-hidden="true"></i> Advanced mode</button>
                    <?php } else { ?>
                      <button type="button" class="btn btn-default disabled set_disabled" data-toggle="popover" data-placement="top" data-original-title="Revision of personal history" data-content='Advanced mode is available for users of the extended license'><i class="fa fa-sliders" aria-hidden="true"></i> Advanced mode</button>
                    <?php } ?>
                  <?php } ?>
                  </div>
                </div>
                <div class="col-md-8 col-md-offset-2 col-xs-12 speed_val ru_block">
                  <div class="lovushka_speed">0</div>
                  rotational speed
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
      <?php } ?>
    <?php } else { ?>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-lg-offset-3">
            <div class="login__form">
              <!-- LOGIN -->
              <form name="loginform" id="loginform" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
                <p>
                  <label for="user_login"><span class="ru_block">Login</span><br />
                    <input type="text" name="log" id="user_login" class="input" value="<?php echo esc_attr($user_login); ?>" size="20" />
                  </label>
                </p>
                <p>
                  <label for="user_pass"><span class="ru_block">Password</span><br />
                    <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" />
                  </label>
                </p>
                <?php
                /**
                 * Fires following the 'Password' field in the login form.
                 *
                 * @since 2.1.0
                 */
                do_action( 'login_form' );
                ?>
                <p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" <?php checked( $rememberme ); ?> /> <span class="ru_block">Remember me</span></label></p>
                <!-- <p class="note_small ru_block">Для доступа к программе напишите на <a class="bablosadres" href="mailto:info@chikurov.com" style="color: #fff;">info@chikurov.com</a></p>
                <p class="note_small hidden en_block">To access the program, write to <a class="bablosadres" href="mailto:info@chikurov.com" style="color: #fff;">info@chikurov.com</a></p> -->
                <p class="submit">
                    <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large ru_block" value="Login" />
                    <?php   if ( $interim_login ) { ?>
                        <input type="hidden" name="interim-login" value="1" />
                    <?php   } else { ?>
                        <input type="hidden" name="redirect_to" value="<?php echo esc_attr($redirect_to); ?>" />
                    <?php   } ?>
                    <?php   if ( $customize_login ) : ?>
                        <input type="hidden" name="customize-login" value="1" />
                    <?php   endif; ?>
                    <input type="hidden" name="testcookie" value="1" />
                </p>
                <p class="ru_block">Do not have an account yet? <span class="toRegistration">Register</span> in "Wizard Lovuska" and learn how to get access</p>
              </form>

              <!-- REGISTRATION -->
              <form id="registerform" class="hidden" action="<?php echo site_url('wp-login.php?action=register'); ?>" method="post">
                <p>
                  <label for="user_login">
                    Придумайте логин<br>
                    <input type="text" name="user_login" id="user_login" class="input" value="" size="20" style="">
                  </label>
                </p>
                <p>
                  <label for="user_email">
                    E-mail<br>
                    <input type="email" name="user_email" id="user_email" class="input" value="" size="25">
                  </label>
                </p>

                <p id="reg_passmail">Подтверждение регистрации будет отправлено на ваш e-mail.</p>

                <br class="clear">
                <input type="hidden" name="redirect_to" value="">

                <p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Регистрация"></p>
                <p class="ru_block">Do you already have an account? <span class="toLogin">Enter</span> in "Wizard Lovuska" using your login and password</p>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </section><!-- end of doctor section -->
  <footer class="footer clearfix">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="pull-left" style="padding-top: 7px;">
            <a href="/">WizardLovushka</a> | v 1.1 | &copy; 
            <a class="ru_block" href="http://www.chikurov.com" target="_blank">Yuri Chikurov</a> | 2018
          </div>
          <?php if(is_user_logged_in()){ ?>
          <div class="pull-right">
            <a class="btn btn_sm btn_warning wings_door_closed ru_block" href="<?php echo home_url(); ?>/wp-login.php?action=logout&amp;_wpnonce=a6cad512ba">Exit</a>
          </div>
          <?php } ?>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
  <!-- script tags
  ============================================================= -->
  <script src="<?php bloginfo('template_url'); ?>/js/jquery-2.1.1.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
  <!-- Yandex.Metrika counter -->
  <script type="text/javascript" >
      (function (d, w, c) {
          (w[c] = w[c] || []).push(function() {
              try {
                  w.yaCounter48119267 = new Ya.Metrika({
                      id:48119267,
                      clickmap:true,
                      trackLinks:true,
                      accurateTrackBounce:true
                  });
              } catch(e) { }
          });

          var n = d.getElementsByTagName("script")[0],
              s = d.createElement("script"),
              f = function () { n.parentNode.insertBefore(s, n); };
          s.type = "text/javascript";
          s.async = true;
          s.src = "https://mc.yandex.ru/metrika/watch.js";

          if (w.opera == "[object Opera]") {
              d.addEventListener("DOMContentLoaded", f, false);
          } else { f(); }
      })(document, window, "yandex_metrika_callbacks");
  </script>
  <noscript><div style="display: none;"><img src="https://mc.yandex.ru/watch/48119267" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
  <!-- /Yandex.Metrika counter -->
  <div class="modal fade" id="set" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><span class="ru_block">Diagnosis of personal history:</span></h4>
        </div>
        <div class="modal-body text-centered">
          <h4 class="ru_block">Please choose no more than 2 current issue from the list.</h4>
          <div class="questions">
            <div class="ru_block">
              <button type="button" class="btn btn-default question noactive" data-quest_one = "2" data-quest_two = "5" data-choiced="">The anger at someone, situation. Or the anger at yourself</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "5" data-quest_two = "2" data-choiced="">Difficulties in communication or difficulties in any affairs</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "7" data-quest_two = "12" data-choiced="">Feeling guilty</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "3" data-quest_two = "6" data-choiced="">Holding yourself back or lowering self-esteem</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "4" data-quest_two = "1" data-choiced="">The need to follow someone else’s opinion</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "6" data-quest_two = "3" data-choiced="">Something in your life that you cannot accept</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "1" data-quest_two = "4" data-choiced="">Worries, bustling and fears</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "8" data-quest_two = "12" data-choiced="">Wishes and the rules of life</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "9" data-quest_two = "12" data-choiced="">Dilemmas related to subjects or relationships</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "10" data-quest_two = "12" data-choiced="">Not realised life goals and wishes</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "11" data-quest_two = "12" data-choiced="">Offences  and humiliations</button>
            </div>
          </div>
          <div class="runed hidden">
            <h3><span class="ru_block">The session is still running!</span></h3>
            <h4><span class="ru_block">Before starting a new session, you must stop the current</span></h4>
            <button class="btn btn-primary btn-lg stop_prot ru_block">Stop</button>
          </div>
        </div>
        <div class="modal-footer ru_block">
          <div class="pull-left">
            <button class="btn btn-warning clear_prot hidden">Deselect</button>
          </div>
          <button class="btn btn-primary set_acept hidden">Apply Settings</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="result" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><span class="ru_block">The manual</span></h4>
        </div>
        <div class="modal-text ru_block">
          Switch on the device and put you third right finger to the centre of the picture. Follow the instructions and try to recollect the situations from your life that were offered to you. Please be honest to yourself , do not  imagine. Hold your finger at the LOVUSHKA no less than 2min for every issue, then press the button “next” and put you finger to the centre again. Please continue the session until the instructions has been finished. This procedure is recommended to be repeated 4 times per month or more. Next time you can choose another issues from the list.
          <div class="row text-centered">
            <div class="col-md-12">
              <button class="btn btn-primary start_prot">Enable LOVUSHKA</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="manual" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><span class="ru_block">The manual</span></h4>
        </div>
        <div class="modal-text ru_block">
          <b>Method 1. Releasing.</b><br>
          Click on the button of your experience. Put the middle finger of the right hand in the center of the LOVUSHKA and start to speak out your problems. The LOVUSHKA will turn off automatically. Repeat if necessary. The number of repetitions is unlimited.<br>
          <b>Method 2. Revision of personal history.</b><br>
          Please, choose no more than two problems from the list. Put you third right finger to the centre of the picture and try to recall the situations from your life that are offered by the device. Please don’t imagine. Be honest to yourself. Continue it no less than 2 min for every issue. It is recommended to repeat this procedure 4 times per month or more. Next time you can choose another issues from the list.
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary ru_block" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
