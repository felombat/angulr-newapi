<html>

<head>
    <title><?php echo  $title . ":: Astrio Collect service" ; ?></title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="Mini Accounting app, Finances tracking, WebApp" name="keywords">
    <meta content="@epok07" name="author">
    <meta content="Astrio Services : Mini Accounting App" name="description">
    <meta content="width=device-width, initial-scale=.85" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <!-- <link href="http://fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet" type="text/css"> -->
    <!-- <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="css/main.css@version=4.3.0" rel="stylesheet">  -->
<!--    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">-->

    <?php echo Asset::css(array(
        'select2/dist/css/select2.min.css',
        //'font-awesome.css',
        //'font.css',
        'bootstrap-daterangepicker/daterangepicker.css',
        "bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.css",
        'dropzone/dist/dropzone.css',
        //'datatables.net-bs/css/dataTables.bootstrap.min.css',
        'jquery.dataTables.min.css',
        'fullcalendar/dist/fullcalendar.min.css',
        'perfect-scrollbar/css/perfect-scrollbar.min.css',
        'slick-carousel/slick/slick.css',

        'themefy/themify-icons.css',
        //'font-awesome/css/font-awesome.min.css',
        'font-awesome.css',
        'entypo/style.css',
        'foundation-icon-font/foundation-icons.css',
        'main.css',


    )); ?>

    <style type="text/css">
        .layout-w{
            height:99%;
        }
    /* Chart.js */

    @-webkit-keyframes chartjs-render-animation {
        from {
            opacity: 0.99
        }
        to {
            opacity: 1
        }
    }

    @keyframes chartjs-render-animation {
        from {
            opacity: 0.99
        }
        to {
            opacity: 1
        }
    }

    .chartjs-render-monitor {
        -webkit-animation: chartjs-render-animation 0.001s;
        animation: chartjs-render-animation 0.001s;
    }
    </style>
    <style>
    .cke {
        visibility: hidden;
    }
    </style>

    <?php echo Asset::js(array(
                "jquery/dist/jquery.min.js",
                "popper.js/dist/umd/popper.min.js",
                "moment/moment.js",
            ));
    ?>
</head>

<body class="full-screen menu-position-side menu-side-left">
    <div class="all-wrapper solid-bg-all">
        <!--------------------
		START - Top Bar
		-------------------->
        <div class="top-bar color-scheme-transparent" style="height: 65px">
          <?= Asset::img('logo_demo.png', array('width'=>70, 'height'=>70, 'style'=>"position: absolute; left: 0; top: 0; margin: 0 auto; width: 55px")) ?>
            <div class="logo-w menu-size" style="width: 260px">
                <!-- <a class="logo" href="index.html">
                    <div class="logo-element"></div>
                    <div class="logo-label">Astrio :: Collect</div>
                </a> -->
                <?= Html::anchor(URI::base(),'<div class="logo-label"> &nbsp;&nbsp; &nbsp;&nbsp;'.  $app_params['name'] . '</div>',array(" " => ' '));?>
            </div>
            <?php if(Auth::member(80) OR Auth::member(100)):?>
            <div class="fancy-selector-w">
                <div class="fancy-selector-current">
                    <div class="fs-img"><img alt="" src="img/card1.png"></div>
                    <div class="fs-main-info">
                        <div class="fs-name"><?php $default_account = @$data_payload["accounts"][1]; echo @$default_account->name ?></div>
                        <div class="fs-sub"><span>Balance:</span><strong><?= $app_params['currency_label'] ." ". number_format(  Model_Account::balance(@$default_account->id)  ,2,","," " ); ?></strong></div>
                    </div>
                    <div class="fs-extra-info"><strong>5476</strong><span>ending</span></div>
                    <div class="fs-selector-trigger"><i class="os-icon os-icon-arrow-down4"></i></div>
                </div>
                <div class="fancy-selector-options">
                    <?php foreach ($data_payload["accounts"] as $account) :?>
                    <div class="fancy-selector-option">
                        <div class="fs-img"><img alt="" src="img/card2.png"></div>
                        <div class="fs-main-info">
                            <div class="fs-name"><?= $account->name ?> </div>
                            <div class="fs-sub"><span>Balance:</span><strong><?= $app_params['currency_label'] ." ". number_format(  Model_Account::balance($account->id)  ,2,","," " ); ?></strong></div>
                        </div>
                        <!--<div class="fs-extra-info"><strong>5476</strong><span>ending</span></div>-->
                    </div>
                    <?php endforeach;?>
                    <!--<div class="fancy-selector-option active">
                        <div class="fs-img"><img alt="" src="img/card1.png"></div>
                        <div class="fs-main-info">
                            <div class="fs-name">American Express Platinum</div>
                            <div class="fs-sub"><span>Balance:</span><strong>$8,274</strong></div>
                        </div>
                        <div class="fs-extra-info"><strong>2523</strong><span>ending</span></div>
                    </div>
                    <div class="fancy-selector-option">
                        <div class="fs-img"><img alt="" src="img/card3.png"></div>
                        <div class="fs-main-info">
                            <div class="fs-name">CitiBank Preferred Credit</div>
                            <div class="fs-sub"><span>Balance:</span><strong>$1,202</strong></div>
                        </div>
                        <div class="fs-extra-info"><strong>6345</strong><span>ending</span></div>
                    </div>-->
                    <div class="fancy-selector-actions text-right"><a class="btn btn-primary" href="apps_bank.html#"><i class="os-icon os-icon-ui-22"></i><span>Add Account</span></a></div>
                </div>
            </div>
            <?php endif; ?>
            <!--------------------
			START - Top Menu Controls
			-------------------->
            <div class="top-menu-controls">
                <div class="element-search autosuggest-search-activator">
                    <input placeholder="Start typing to search..." type="text">
                </div>
                <!--------------------
				START - Messages Link in secondary top menu
				-------------------->
                <div class="messages-notifications os-dropdown-trigger os-dropdown-position-left"><i class="os-icon os-icon-mail-14"></i>
                    <div class="new-messages-count">
                        <?php if(isset($current_employee) AND !empty($current_employee)  )  : ?>
                            <?= count($data_payload['chats']); ?>
                        <?php elseif(Auth::member(50) == 50): ?>

                            <?php  //count($current_client->chats);
                              count($data_payload['chats']);
                            ?>
                        <?php endif; ?>
                    </div>
                    <div class="os-dropdown light message-list">
                        <ul>
                            <?php foreach($data_payload['chats'] as $chat) : ?>
                                <li>
                                    <a href="#">
                                        <div class="user-avatar-w">
                                            <?php
                                            $user = Model_User::find($chat->from_user_id);
                                            $emp = Model_Employee::find($user->id);
                                            $person = $avatar = null;
                                            $client = Model_Client::find($user->id);

                                            $person = !empty($client) ? $client : $emp;
                                            if(Auth::member(50) == 50){
                                                $person = $client;
                                                $avatar = Model_Client::get_avatar($client->id);
                                            }else{
                                                $person = $emp;
                                                $avatar = Model_Employee::get_avatar($client->id);
                                            }

                                            echo  $avatar;

                                            ?>
                                        </div>
                                        <div class="message-content">
                                            <h6 class="message-from"><?php echo @$person->first_name . " " . @$person->last_name ; ?></h6>
                                            <h6 class="message-title"><?= Str::truncate($chat->message,25) ; ?></h6></div>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>
                <!--------------------
				END - Messages Link in secondary top menu
				-------------------->
				                <!--------------------
				START - Settings Link in secondary top menu
				-------------------->
                <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left"><i class="os-icon os-icon-ui-46"></i>
                    <div class="os-dropdown">
                        <div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div>
                        <ul>
                            <li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a></li>
                            <li><a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a></li>
                            <li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a></li>
                            <li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a></li>
                        </ul>
                    </div>
                </div>
                <!--------------------
				END - Settings Link in secondary top menu
				-------------------->
				                <!--------------------
				START - User avatar and menu in secondary top menu
				-------------------->
                <div class="logged-user-w">
                    <div class="logged-user-i">
                        <div class="avatar-w">
                        	 <?php if(isset($current_employee) AND !empty($current_employee) AND !Auth::member(50)) : ?>
			                	<?= Model_Employee::get_avatar($current_employee->id, 64); ?>
							 <?php endif; ?>
							<?php if(isset($current_client) AND !empty($current_client)) : ?>
			                	<?= Model_Client::get_avatar($current_client->id, 64); ?>
							 <?php endif; ?>
                        </div>
                        <div class="logged-user-menu color-style-bright">
                            <div class="logged-user-avatar-info">
                                <div class="avatar-w"><?php if(isset($current_employee) AND !empty($current_employee) AND !Auth::member(50) ) : ?>
					                	<?= Model_Employee::get_avatar($current_employee->id, 64); ?>
                                    <?php else : ?>
                                        <?= Model_Client::get_avatar($current_client->id, 64 ); ?>
									 <?php endif; ?>
									 </div>
                                <div class="logged-user-info-w">
                                    <div class="logged-user-name"><?php if(isset($current_employee) AND !empty($current_employee)) : ?>
									 <?= "$current_employee->first_name $current_employee->last_name" ?>
                                        <?php else : ?>
                                            <?= "$current_client->first_name $current_client->last_name " ?>
									<?php endif; ?></div>
                                    <div class="logged-user-role">
                                    <?php if(isset($current_employee) AND !empty($current_employee)) : ?>

                                        <?= $current_employee->jobtitle->title ?>
                                        <?php else : ?>
                                        <?=  "Client"; ?>
                                    <?php endif; ?></div>
                                </div>
                            </div>
                            <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                            <ul>
                                <li><a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a></li>
                                <li><a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a></li>
                                <li><a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a></li>
                                <li><a href="apps_bank.html#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a></li>
                                <li> 
									<?= Html::anchor(URI::create('logout'),'<i class="os-icon os-icon-signs-11"></i> Log out',array("" => ''));?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--------------------
				END - User avatar and menu in secondary top menu
				-------------------->
				            </div>
				            <!--------------------
				END - Top Menu Controls
				-------------------->
				        </div>
				        <!--------------------
				END - Top Bar
				-------------------->
        <div class="search-with-suggestions-w">
            <div class="search-with-suggestions-modal">
                <div class="element-search">
                    <input class="search-suggest-input" placeholder="Start typing to search..." type="text">
                    <div class="close-search-suggestions"><i class="os-icon os-icon-x"></i></div>
                </div>
                <div class="search-suggestions-group">
                    <div class="ssg-header">
                        <div class="ssg-icon">
                            <div class="os-icon os-icon-box"></div>
                        </div>
                        <div class="ssg-name">Projects</div>
                        <div class="ssg-info">24 Total</div>
                    </div>
                    <div class="ssg-content">
                        <div class="ssg-items ssg-items-boxed">
                            <a class="ssg-item" href="users_profile_big.html">
                                <div class="item-media" style="background-image: url(img/company6.png)"></div>
                                <div class="item-name">Integ<span>ration</span> with API</div>
                            </a>
                            <a class="ssg-item" href="users_profile_big.html">
                                <div class="item-media" style="background-image: url(img/company7.png)"></div>
                                <div class="item-name">Deve<span>lopm</span>ent Project</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="search-suggestions-group">
                    <div class="ssg-header">
                        <div class="ssg-icon">
                            <div class="os-icon os-icon-users"></div>
                        </div>
                        <div class="ssg-name">Customers</div>
                        <div class="ssg-info">12 Total</div>
                    </div>
                    <div class="ssg-content">
                        <div class="ssg-items ssg-items-list">
                            <a class="ssg-item" href="users_profile_big.html">
                                <div class="item-media" style="background-image: url(img/avatar1.jpg)"></div>
                                <div class="item-name">John Ma<span>yer</span>s</div>
                            </a>
                            <a class="ssg-item" href="users_profile_big.html">
                                <div class="item-media" style="background-image: url(img/avatar2.jpg)"></div>
                                <div class="item-name">Th<span>omas</span> Mullier</div>
                            </a>
                            <a class="ssg-item" href="users_profile_big.html">
                                <div class="item-media" style="background-image: url(img/avatar3.jpg)"></div>
                                <div class="item-name">Kim C<span>olli</span>ns</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="search-suggestions-group">
                    <div class="ssg-header">
                        <div class="ssg-icon">
                            <div class="os-icon os-icon-folder"></div>
                        </div>
                        <div class="ssg-name">Files</div>
                        <div class="ssg-info">17 Total</div>
                    </div>
                    <div class="ssg-content">
                        <div class="ssg-items ssg-items-blocks">
                            <a class="ssg-item" href="apps_bank.html#">
                                <div class="item-icon"><i class="os-icon os-icon-file-text"></i></div>
                                <div class="item-name">Work<span>Not</span>e.txt</div>
                            </a>
                            <a class="ssg-item" href="apps_bank.html#">
                                <div class="item-icon"><i class="os-icon os-icon-film"></i></div>
                                <div class="item-name">V<span>ideo</span>.avi</div>
                            </a>
                            <a class="ssg-item" href="apps_bank.html#">
                                <div class="item-icon"><i class="os-icon os-icon-database"></i></div>
                                <div class="item-name">User<span>Tabl</span>e.sql</div>
                            </a>
                            <a class="ssg-item" href="apps_bank.html#">
                                <div class="item-icon"><i class="os-icon os-icon-image"></i></div>
                                <div class="item-name">wed<span>din</span>g.jpg</div>
                            </a>
                        </div>
                        <div class="ssg-nothing-found">
                            <div class="icon-w"><i class="os-icon os-icon-eye-off"></i></div><span>No files were found. Try changing your query...</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layout-w">
            <!--------------------
			START - Mobile Menu
			-------------------->
            <div class="menu-mobile menu-activated-on-click color-scheme-dark">
                <div class="mm-logo-buttons-w">
                <?= Html::anchor(URI::base(), Asset::img('favicon120x120.png') ,array("class" => 'mm-logo'));?>
                <!-- <a class="mm-logo" href="index.html"><img src="img/favicon.png"><span>Clean Admin</span></a> -->
                    <div class="mm-buttons">
                        <div class="content-panel-open">
                            <div class="os-icon os-icon-grid-circles"></div>
                        </div>
                        <div class="mobile-menu-trigger">
                            <div class="os-icon os-icon-hamburger-menu-1"></div>
                        </div>
                    </div>
                </div>
                
                         
                                 
                <div class="menu-and-user">
                    <div class="logged-user-w">
                        <div class="avatar-w">
							<?php if(isset($current_employee) AND !empty($current_employee)) : ?>
			                	<?= Model_Employee::get_avatar($current_employee->id, 64); ?>
							 <?php endif; ?>
                        </div>
                        <div class="logged-user-info-w">
                            <div class="logged-user-name">
                            <?php if(isset($current_employee) AND !empty($current_employee)) : ?>
                                <?= "$current_employee->first_name $current_employee->last_name" ?>
                                  <?php endif; ?></div>
                            <div class="logged-user-role"><?php if(isset($current_employee) AND !empty($current_employee)) : ?><?= $current_employee->jobtitle->title ?> <?php endif; ?></div>
                        </div>
                    </div>
                    <!--------------------
					START - Mobile Menu List
					-------------------->
                    <?php /*
                    <ul class="main-menu">
                        <li class="has-sub-menu">
                            <a href="index.html">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-layout"></div>
                                </div><span>Dashboard</span></a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Dashboard 1</a></li>
                                <li><a href="apps_support_dashboard.html">Dashboard 2 <strong class="badge badge-danger">New</strong></a></li>
                                <li><a href="apps_projects.html">Dashboard 3</a></li>
                                <li><a href="apps_bank.html">Dashboard 4 <strong class="badge badge-danger">New</strong></a></li>
                                <li><a href="layouts_menu_top_image.html">Dashboard 5</a></li>
                            </ul>
                        </li>
                       
                        <li class="has-sub-menu">
                            <a href="apps_bank.html">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-package"></div>
                                </div><span>Applications</span></a>
                            <ul class="sub-menu">
                                <li><a href="apps_email.html">Email Application</a></li>
                                <li><a href="apps_support_dashboard.html">Support Dashboard <strong class="badge badge-danger">New</strong></a></li>
                                <li><a href="apps_support_index.html">Tickets Index <strong class="badge badge-danger">New</strong></a></li>
                                <li><a href="apps_projects.html">Projects List</a></li>
                                <li><a href="apps_bank.html">Banking <strong class="badge badge-danger">New</strong></a></li>
                                <li><a href="apps_full_chat.html">Chat Application</a></li>
                                <li><a href="apps_todo.html">To Do Application <strong class="badge badge-danger">New</strong></a></li>
                                <li><a href="misc_chat.html">Popup Chat</a></li>
                                <li><a href="apps_pipeline.html">CRM Pipeline</a></li>
                                <li><a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a></li>
                                <li><a href="misc_calendar.html">Calendar</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu">
                            <a href="apps_bank.html#">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-file-text"></div>
                                </div><span>Pages</span></a>
                            <ul class="sub-menu">
                                <li><a href="misc_invoice.html">Invoice</a></li>
                                <li><a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a></li>
                                <li><a href="misc_charts.html">Charts</a></li>
                                <li><a href="auth_login.html">Login</a></li>
                                <li><a href="auth_register.html">Register</a></li>
                                <li><a href="auth_lock.html">Lock Screen</a></li>
                                <li><a href="misc_pricing_plans.html">Pricing Plans</a></li>
                                <li><a href="misc_error_404.html">Error 404</a></li>
                                <li><a href="misc_error_500.html">Error 500</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu">
                            <a href="apps_bank.html#">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-life-buoy"></div>
                                </div><span>UI Kit</span></a>
                            <ul class="sub-menu">
                                <li><a href="uikit_modals.html">Modals <strong class="badge badge-danger">New</strong></a></li>
                                <li><a href="uikit_alerts.html">Alerts</a></li>
                                <li><a href="uikit_grid.html">Grid</a></li>
                                <li><a href="uikit_progress.html">Progress</a></li>
                                <li><a href="uikit_popovers.html">Popover</a></li>
                                <li><a href="uikit_tooltips.html">Tooltips</a></li>
                                <li><a href="uikit_buttons.html">Buttons</a></li>
                                <li><a href="uikit_dropdowns.html">Dropdowns</a></li>
                                <li><a href="uikit_typography.html">Typography</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu">
                            <a href="apps_bank.html#">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-mail"></div>
                                </div><span>Emails</span></a>
                            <ul class="sub-menu">
                                <li><a href="emails_welcome.html">Welcome Email</a></li>
                                <li><a href="emails_order.html">Order Confirmation</a></li>
                                <li><a href="emails_payment_due.html">Payment Due</a></li>
                                <li><a href="emails_forgot.html">Forgot Password</a></li>
                                <li><a href="emails_activate.html">Activate Account</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu">
                            <a href="apps_bank.html#">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-users"></div>
                                </div><span>Users</span></a>
                            <ul class="sub-menu">
                                <li><a href="users_profile_big.html">Big Profile</a></li>
                                <li><a href="users_profile_small.html">Compact Profile</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu">
                            <a href="apps_bank.html#">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-edit-32"></div>
                                </div><span>Forms</span></a>
                            <ul class="sub-menu">
                                <li><a href="forms_regular.html">Regular Forms</a></li>
                                <li><a href="forms_validation.html">Form Validation</a></li>
                                <li><a href="forms_wizard.html">Form Wizard</a></li>
                                <li><a href="forms_uploads.html">File Uploads</a></li>
                                <li><a href="forms_wisiwig.html">Wisiwig Editor</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu">
                            <a href="apps_bank.html#">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-grid"></div>
                                </div><span>Tables</span></a>
                            <ul class="sub-menu">
                                <li><a href="tables_regular.html">Regular Tables</a></li>
                                <li><a href="tables_datatables.html">Data Tables</a></li>
                                <li><a href="tables_editable.html">Editable Tables</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu">
                            <a href="apps_bank.html#">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-zap"></div>
                                </div><span>Icons</span></a>
                            <ul class="sub-menu">
                                <li><a href="icon_fonts_simple_line_icons.html">Simple Line Icons</a></li>
                                <li><a href="icon_fonts_feather.html">Feather Icons</a></li>
                                <li><a href="icon_fonts_themefy.html">Themefy Icons</a></li>
                                <li><a href="icon_fonts_picons_thin.html">Picons Thin</a></li>
                                <li><a href="icon_fonts_dripicons.html">Dripicons</a></li>
                                <li><a href="icon_fonts_eightyshades.html">Eightyshades</a></li>
                                <li><a href="icon_fonts_entypo.html">Entypo</a></li>
                                <li><a href="icon_fonts_font_awesome.html">Font Awesome</a></li>
                                <li><a href="icon_fonts_foundation_icon_font.html">Foundation Icon Font</a></li>
                                <li><a href="icon_fonts_metrize_icons.html">Metrize Icons</a></li>
                                <li><a href="icon_fonts_picons_social.html">Picons Social</a></li>
                                <li><a href="icon_fonts_batch_icons.html">Batch Icons</a></li>
                                <li><a href="icon_fonts_dashicons.html">Dashicons</a></li>
                                <li><a href="icon_fonts_typicons.html">Typicons</a></li>
                                <li><a href="icon_fonts_weather_icons.html">Weather Icons</a></li>
                                <li><a href="icon_fonts_light_admin.html">Light Admin</a></li>
                            </ul>
                        </li>
                    </ul>
                    */;?>
                    <ul class="main-menu">
                        <li class="selected has-sub-menu">
                            <a href="javascript:void(0)">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-layout"></div>
                                </div><span>Dashboard</span></a>

                                    <ul class="sub-menu">
                                        <li><?= Html::anchor(Uri::create('dashboard'), 'Dashboard');?></li>
                                        <li><?= Html::anchor(Uri::create('dashboard/report'), 'Reports <strong class="badge badge-danger">New</strong>');?></li>

                                    </ul>


                        </li>
                        <li class="has-sub-menu">
                            <a href="javascript:">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-package"></div>
                                </div><span>Transactions</span></a>



                                    <ul class="sub-menu">
                                        <li><?= Html::anchor(Uri::create('contribution'), 'Cotisations');?>
                                             <?php if(Auth::member(80) OR Auth::member(100)) :?>
                                        <li><?= Html::anchor(Uri::create('transaction'), 'Op Internes' .'<strong class="badge badge-danger">New</strong>');?> </li>
                                            <?php endif;?>

                                    </ul>


                        </li>



                        <li class="has-sub-menu">
                            <a href="javascript:">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-life-buoy"></div>
                                </div><span>Membres</span></a>
                            <div class="sub-menu-w">


                                    <ul class="sub-menu">
                                        <li><?= Html::anchor(Uri::create('client'), 'Dossiers');?> </li>
                                        <!--<li><?/*= Html::anchor(Uri::create('client/rapports'), 'Rapports');*/?> </li>
                                    <li><?/*= Html::anchor(Uri::create('contribution'), 'Suivi' .'<strong class="badge badge-danger">New</strong>');*/?>  </li>
                                    <li><?/*= Html::anchor(Uri::create('employee/rapports'), 'Progress');*/?> </li>
                                    <li><?/*= Html::anchor(Uri::create('employee/covrage'), 'Popover');*/?> </li>-->
                                    </ul>


                        </li>

                    </ul>
                    <!--------------------
					END - Mobile Menu List
					-------------------->
                    <?php /*<div class="mobile-menu-magic">
                        <h4>Light Admin</h4>
                        <p>Clean Bootstrap 4 Template</p>
                        <div class="btn-w"><a class="btn btn-white btn-rounded" href="https://themeforest.net/item/light-admin-clean-bootstrap-dashboard-html-template/19760124?ref=Osetin" target="_blank">Purchase Now</a></div>
                    </div> */ ?>
                </div>
            </div>
            <!--------------------
			END - Mobile Menu
			-------------------->
			            <!--------------------
			START - Main Menu
			-------------------->
            <div class="menu-w menu-activated-on-hover menu-has-selected-link selected-menu-color-light color-scheme-light color-style-default sub-menu-color-light menu-position-side menu-side-left menu-layout-compact sub-menu-style-over">
                <div class="logged-user-w avatar-inline">
                    <div class="logged-user-i">
                        <div class="avatar-w"><?php if(isset($current_employee) AND !empty($current_employee)) : ?>
			                	<?= Model_Employee::get_avatar($current_employee->id, 64); ?>

                            <?php endif; ?>
                            <?php if(isset($current_client) AND !empty($current_client)): ?>
                                <?= Model_Client::get_avatar($current_client->id, 64); ?>
                            <?php endif; ?>


                        </div>
                        <div class="logged-user-info-w">
                            <div class="logged-user-name"><?php if(isset($current_employee) AND !empty($current_employee)) : ?>
							 <?= "$current_employee->first_name $current_employee->last_name" ?>
                            <?php endif; ?>


                            </div>
                            <div class="logged-user-role"><?php if(isset($current_employee) AND !empty($current_employee)) : ?><?= $current_employee->jobtitle->title ?> <?php endif; ?></div>
                        </div>
                        <div class="logged-user-toggler-arrow">
                            <div class="os-icon os-icon-chevron-down"></div>
                        </div>
                        <div class="logged-user-menu color-style-bright">
                            <div class="logged-user-avatar-info">
                                <div class="avatar-w"><?php if(isset($current_employee) AND !empty($current_employee)) : ?>
			                	<?= Model_Employee::get_avatar($current_employee->id, 64); ?>
                                        <?php else: ?>
                                        <?= Model_Client::get_avatar($current_user->id, 64); ?>
							 <?php endif; ?></div>
                                <div class="logged-user-info-w">
                                    <div class="logged-user-name"><?php if(isset($current_employee) AND !empty($current_employee)) : ?>
										 <?= "$current_employee->first_name $current_employee->last_name" ?>
										<?php endif; ?></div>
                                    <div class="logged-user-role"><?php if(isset($current_employee) AND !empty($current_employee)) : ?><?= $current_employee->jobtitle->title ?> <?php endif; ?></div>
                                </div>
                            </div>
                            <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                            <ul>
                                <li><a href="#"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a></li>
                                <?php if( isset($current_client) ) :?>
                                <li><a href="#"><i class="os-icon os-icon-user-male-circle2"></i><span><?php  echo "$current_client->first_name $current_client->last_name" ?></span></a></li>
                                <?php endif;?>
                                <li><a href="#"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a></li>
                                <li><a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a></li>
 								<li> 
									<?= Html::anchor(URI::create('logout'),'<i class="os-icon os-icon-signs-11"></i> Log out',array("" => ''));?>
                                </li>                            </ul>
                        </div>
                    </div>
                </div>
                <div class="menu-actions">
                    <!--------------------
					START - Messages Link in secondary top menu
					-------------------->
                    <div class="messages-notifications os-dropdown-trigger os-dropdown-position-right"><i class="os-icon os-icon-mail-14"></i>
                        <div class="new-messages-count">
                            <?php if(isset($current_employee) AND !empty($current_employee)  )  : ?>
                                <?= count($data_payload['chats']); ?>
                            <?php elseif(Auth::member(50) == 50): ?>

                                <?= count($data_payload['chats']); ?>
                            <?php endif; ?>
                        </div>
                        <div class="os-dropdown light message-list">
                            <ul>
                                <?php foreach($data_payload['chats'] as $chat) : ?>
                                <li>
                                    <a href="#">
                                        <div class="user-avatar-w">
                                            <?php
                                            /*$user = Model_User::find($chat->from_user_id);
                                            $person = isset($user->account_id) ? Model_Employee::find($user->employee->id) : Model_Client::find($user->id);
                                            $avatar = null;
//                                            $person = new StdClass();
//                                            $person->first_name = "n/a";
//                                            $person->last_name = "-";

                                            $client = Model_Client::find($chat->from_user_id);

                                            $person = !empty($client) ? $client : $person;
                                            $avatar = (isset($person->assigned_to)) ? Model_Client::get_avatar($person->id) : Model_Employee::get_avatar($person->id);


			                	            echo  $avatar;*/

                                            $user = Model_User::find($chat->from_user_id);
                                            $emp = Model_Employee::find($user->id);
                                            $person = $avatar = null;
                                            $client = Model_Client::find($user->id);

                                            $person = !empty($client) ? $client : $emp;
                                            if (!isset($person->account_id)){
                                                $person = $client;
                                                $avatar = Model_Client::get_avatar($person->id);
                                            }else{
                                                $person = $emp;
                                                $avatar = Model_Employee::get_avatar($person->id);
                                            }

                                            echo  $avatar;
                                            ?>
							                </div>
                                        <div class="message-content">
                                            <h6 class="message-from"><?php echo @$person->first_name . " " . @$person->last_name ; ?></h6>
                                            <h6 class="message-title"><?= Str::truncate($chat->message,25) ; ?></h6></div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                                <!--<li>
                                    <a href="apps_bank.html#">
                                        <div class="user-avatar-w"><img alt="" src="img/avatar2.jpg"></div>
                                        <div class="message-content">
                                            <h6 class="message-from">Phil Jones</h6>
                                            <h6 class="message-title">Secutiry Updates</h6></div>
                                    </a>
                                </li>-->

                            </ul>
                        </div>
                    </div>
                    <!--------------------
					END - Messages Link in secondary top menu
					-------------------->
					                    <!--------------------
					START - Settings Link in secondary top menu
					-------------------->
                    <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-right"><i class="os-icon os-icon-ui-46"></i>
                        <div class="os-dropdown">
                            <div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div>
                            <ul>
                                <li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a></li>
                                <li><a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a></li>
                                <li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a></li>
                                <li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--------------------
						END - Settings Link in secondary top menu
						-------------------->
						                    <!--------------------
						START - Messages Link in secondary top menu
						-------------------->
                    <div class="messages-notifications os-dropdown-trigger os-dropdown-position-right"><i class="os-icon os-icon-zap"></i>
                        <div class="new-messages-count">
                            <?php if(isset($current_employee) AND !empty($current_employee)  )  : ?>
                                <?= count($data_payload['activities']); ?>
                            <?php elseif(Auth::member(50) == 50): ?>

                                <?= count($current_client->messages); ?>
                            <?php endif; ?>
                        </div>
                        <div class="os-dropdown light message-list">
                            <div class="icon-w"><i class="os-icon os-icon-zap"></i></div>
                            <ul>
                                <?php foreach($data_payload['activity_logs'] as $activity) :?>
                                <li>

                                    <a href="#">
                                        <div class="user-avatar-w">

 			                	        <?php
                                        $employee = Model_Employee::find($activity->created_by);
 			                	        echo Model_Employee::get_avatar(@$employee->id, 64); ?>

                                        </div>
                                        <div class="message-content">
                                            <h6 class="message-from small"><?=@$employee->first_name ." ". @$employee->last_name;?></h6>
                                            <h6 class="message-title small"><span class="badge badge-info small"><?= $activity->action ;?></span> <?= "$activity->log_type :: $activity->log_type_title " ;?></h6></div>
                                    </a>
                                </li>
                                <?php endforeach;?>
                                <!--<li>
                                    <a href="apps_bank.html#">
                                        <div class="user-avatar-w"><img alt="" src="img/avatar2.jpg"></div>
                                        <div class="message-content">
                                            <h6 class="message-from">Phil Jones</h6>
                                            <h6 class="message-title">Secutiry Updates</h6></div>
                                    </a>
                                </li>-->

                            </ul>
                        </div>
                    </div>
                    <!--------------------
					END - Messages Link in secondary top menu
					-------------------->
                </div>
                <div class="element-search autosuggest-search-activator">
                    <input placeholder="Start typing to search..." type="text">
                </div>
                <h1 class="menu-page-header">Page Header</h1>
                <ul class="main-menu">
                    <li class="sub-header"><span>Reporting</span></li>
                    <li class="selected has-sub-menu">
                        <a href="javascript:void(0)">
                            <div class="icon-w">
                                <div class="os-icon os-icon-layout"></div>
                            </div><span>Dashboard</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">Dashboard</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-layout"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><?= Html::anchor(Uri::create('dashboard'), 'Dashboard');?></li>
                                    <li><?= Html::anchor(Uri::create('dashboard/report'), 'Reports <strong class="badge badge-danger">New</strong>');?></li>
                                     
                                </ul>
                            </div>
                        </div>
                    </li>
                   
                    <li class="sub-header"><span>Finances</span></li>
                    <li class="has-sub-menu">
                        <a href="javascript:">
                            <div class="icon-w">
                                <div class="os-icon os-icon-package"></div>
                            </div><span>Transactions</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">Finances</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-package"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><?= Html::anchor(Uri::create('contribution'), 'Cotisations');?> 
<!--                                    <li>--><?//= Html::anchor(Uri::create('withdraw'), 'Retraits');?><!--</li>-->
                                    <?php if(Auth::member(80) OR Auth::member(100)) :?>
                                    <li><?= Html::anchor(Uri::create('transaction'), 'Op Internes' .'<strong class="badge badge-danger">New</strong>');?> </li>
                                    <?php endif;?>
<!--                                    <li>--><?//= Html::anchor(Uri::create('deposit'), 'Depots' .'<strong class="badge badge-warning">coming soon</strong>');?><!--</li>-->
                                    
                                </ul>
                                
                            </div>
                        </div>
                    </li>
                    <?php /*
                    <li class="has-sub-menu">
                        <a href="apps_bank.html#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-file-text"></div>
                            </div><span>Produits</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">Pages</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-file-text"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="misc_invoice.html">Invoice</a></li>
                                    <li><a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a></li>
                                    <li><a href="misc_charts.html">Charts</a></li>
                                    <li><a href="auth_login.html">Login</a></li>
                                    <li><a href="auth_register.html">Register</a></li>
                                </ul>
                                <ul class="sub-menu">
                                    <li><a href="auth_lock.html">Lock Screen</a></li>
                                    <li><a href="misc_pricing_plans.html">Pricing Plans</a></li>
                                    <li><a href="misc_error_404.html">Error 404</a></li>
                                    <li><a href="misc_error_500.html">Error 500</a></li>
                                </ul>
                            </div>
                        </div>
                    </li> */ ?>
                    <li class="has-sub-menu">
                        <a href="javascript:">
                            <div class="icon-w">
                                <div class="os-icon os-icon-life-buoy"></div>
                            </div><span>Membres</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">Membres</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-life-buoy"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><?= Html::anchor(Uri::create('client'), 'Dossiers');?> </li>
                                    <!--<li><?/*= Html::anchor(Uri::create('client/rapports'), 'Rapports');*/?> </li>
                                    <li><?/*= Html::anchor(Uri::create('contribution'), 'Suivi' .'<strong class="badge badge-danger">New</strong>');*/?>  </li>
                                    <li><?/*= Html::anchor(Uri::create('employee/rapports'), 'Progress');*/?> </li>
                                    <li><?/*= Html::anchor(Uri::create('employee/covrage'), 'Popover');*/?> </li>-->
                                </ul>
                                
                        </div>
                    </li>
                    <?php /*
                    <li class="sub-header"><span>Settings</span></li>
                     <li class="has-sub-menu">
                            <a href="layouts_menu_top_image.html">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-layers"></div>
                                </div><span>Employees</span></a>
                            <ul class="sub-menu">
                                <li><?= Html::anchor(Uri::create('settings'), 'Settings');?> </li>
                                <li><a href="layouts_menu_side_full_dark.html">Side Menu Dark</a></li>
                                <li><a href="layouts_menu_side_transparent.html">Side Menu Transparent <strong class="badge badge-danger">New</strong></a></li>
                                 
                            </ul>
                     </li>
                     <li class="has-sub-menu">
                        <a href="apps_bank.html">
                            <div class="icon-w">
                                <div class="os-icon os-icon-package"></div>
                            </div><span>Params</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">Parameters</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-package"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="apps_email.html">Modules</a></li>
                                    <li><a href="apps_support_dashboard.html">Email </a></li>
                                    <li><a href="apps_support_index.html"> Role <strong class="badge badge-danger">New</strong></a></li>
                                    <li><a href="apps_projects.html">Notifications</a></li>
                                    
                                </ul>
                                
                            </div>
                        </div>
                    </li>

                    <li class="has-sub-menu">
                        <a href="apps_bank.html">
                            <div class="icon-w">
                                <div class="os-icon os-icon-package"></div>
                            </div><span>Company</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">Company</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-package"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="apps_email.html">Details</a></li>
                                    <li><a href="apps_support_dashboard.html">APIs </a>
											<li class="has-sub-menu">
						                        <a href="apps_bank.html">
						                            <div class="icon-w">
						                                <div class="os-icon os-icon-package"></div>
						                            </div><span>Params</span></a>
						                        <div class="sub-menu">
						                            <div class="sub-menu-header">APIS</div>
						                            <div class="sub-menu-icon"><i class="os-icon os-icon-package"></i></div>
						                            <div class="sub-menu-i">
						                                <ul class="sub-menu">
						                                    <li><a href="apps_email.html">SMS</a></li>
						                                    <li><a href="apps_support_dashboard.html">Orange Money </a></li>
						                                    <li><a href="apps_support_index.html"> MRN Mobile money <strong class="badge badge-danger">New</strong></a></li>
						                                    <li><a href="apps_projects.html">Nexttel eWallet</a></li>
						                                    
						                                </ul>
						                                
						                            </div>
						                        </div>
						                    </li>
                                    </li>
                                    <li><a href="apps_support_index.html"> Loans <strong class="badge badge-danger">New</strong></a></li>
                                    <li><a href="apps_projects.html">Depots</a></li>
                                    
                                </ul>
                                
                            </div>
                        </div>
                    </li>
                    */ ?>
                </ul>
            </div>
            <!--------------------
				END - Main Menu
				-------------------->
            <div class="content-w">
                <div class="content-i">
                    <?php if (\Messages::any()): ?>
                        <br/>
                        <?php foreach (array('success', 'info', 'warning', 'error') as $type): ?>

                            <?php foreach (\Messages::instance()->get($type) as $message): ?>
                                <div class="alert alert-<?= $message['type']; ?>">
                                    <h4 class="alert-heading"><?= (isset($message['title'])) ? @$message['title']: "Alert !!!"; ?></h4>

                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button>
                                    <p class="fade"> <?= $message['body']; ?> </p>
                                </div>
                            <?php endforeach; ?>

                        <?php endforeach; ?>
                        <?php \Messages::reset(); ?>
                    <?php endif; ?>
                </div>

                <div class="content-i">
                    <?php if (Session::get_flash('success')): ?>
                        <div class="alert alert-success">
                            <strong>Success</strong>
                            <p>
                                <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                            </p>
                        </div>
                        <script async>
                            // Notice
                            // Display a info toast, with a title

                            toastr.info('Notice:',"<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>");
                        </script>
                    <?php endif; ?>
                    <?php if (Session::get_flash('error')): ?>
                        <div class="alert alert-danger">
                            <strong>Error</strong>
                            <p>
                                <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>

            	<div class="content-i">
                	<?php echo $content; ?>
            	</div>
            </div>
        </div>
        <div class="display-type"></div>
    </div>

    <!-- <script async="" src="https://www.google-analytics.com/analytics.js"></script> -->
    <!-- <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="bower_components/moment/moment.js"></script>
    <script src="bower_components/chart.js/dist/Chart.min.js"></script>
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="bower_components/ckeditor/ckeditor.js"></script>
    <script src="bower_components/bootstrap-validator/dist/validator.min.js"></script>
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <script src="bower_components/dropzone/dist/dropzone.js"></script>
    <script src="bower_components/editable-table/mindmup-editabletable.js"></script>
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="bower_components/tether/dist/js/tether.min.js"></script>
    <script src="bower_components/slick-carousel/slick/slick.min.js"></script>
    <script src="bower_components/bootstrap/js/dist/util.js"></script>
    <script src="bower_components/bootstrap/js/dist/alert.js"></script>
    <script src="bower_components/bootstrap/js/dist/button.js"></script>
    <script src="bower_components/bootstrap/js/dist/carousel.js"></script>
    <script src="bower_components/bootstrap/js/dist/collapse.js"></script>
    <script src="bower_components/bootstrap/js/dist/dropdown.js"></script>
    <script src="bower_components/bootstrap/js/dist/modal.js"></script>
    <script src="bower_components/bootstrap/js/dist/tab.js"></script>
    <script src="bower_components/bootstrap/js/dist/tooltip.js"></script>
    <script src="bower_components/bootstrap/js/dist/popover.js"></script>
    <script src="js/demo_customizer.js@version=4.3.0"></script>
    <script src="js/main.js@version=4.3.0"></script> -->
<!--    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->
	 <?php echo Asset::js(array(
        //"jquery/dist/jquery.min.js",
        //"popper.js/dist/umd/popper.min.js",
        //"moment/moment.js",
        "chart.js/dist/Chart.min.js",
        "select2/dist/js/select2.full.min.js",
        "jquery-bar-rating/dist/jquery.barrating.min.js",
        "ckeditor/ckeditor.js",
        "bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.js",
        "bootstrap-validator/dist/validator.min.js",
        "bootstrap-daterangepicker/daterangepicker.js",
        "ion.rangeSlider/js/ion.rangeSlider.min.js",
	    "dropzone/dist/dropzone.js",
	    "editable-table/mindmup-editabletable.js",
	    "datatables.net/js/jquery.dataTables.min.js",
	    //"datatables.net-bs/js/dataTables.bootstrap.min.js",
	    "fullcalendar/dist/fullcalendar.min.js",
	    "perfect-scrollbar/js/perfect-scrollbar.jquery.min.js",
	    "tether/dist/js/tether.min.js",
	    "slick-carousel/slick/slick.min.js",
	    "bootstrap/js/dist/util.js",
	    "bootstrap/js/dist/alert.js",
	    "bootstrap/js/dist/button.js",
	    "bootstrap/js/dist/carousel.js",
	    "bootstrap/js/dist/collapse.js",
	    "bootstrap/js/dist/dropdown.js",
	    "bootstrap/js/dist/modal.js",
	    "bootstrap/js/dist/tab.js",
	    "bootstrap/js/dist/tooltip.js",
	    "bootstrap/js/dist/popover.js",
        'demo_customizer.min.js',
        'main.js',

 
    )); ?>

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

    <script type="text/javascript">
        // DateTime Picker Config
        $.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, {
            icons: {
                time: 'ti-time',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-calendar-check-o',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            },
            format: 'YYYY-MM-DD HH:mm:ss'
        });

             $(function () {
                $('.datetimepicker').datetimepicker({
                    locale : 'fr'
                });

                 // Select2 Config
                 $('.select2').select2();

                 // DataTables init
                 //$('.dTable').animate(function (e) {
                 //    $this = $(this);

                 if ($('.dTable').length) {
                    $('.dTable').DataTable({
                        buttons: ['copy', 'excel', 'pdf'] ,
                        "language": {
                            "url" :"//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json"
                        }
                    });
//                     $('.dTable').hide();
//                     $('.dTable').dataTable();
//                     $('.dTable').fadeIn(800);




                 }


            });


    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-118890233-1', 'auto');
    ga('send', 'pageview');




    </script>
</body>

</html>