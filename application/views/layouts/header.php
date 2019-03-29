
<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Control Panel</title>
  <meta name="description" content="Permintaan Barang Pinago" />
  <meta name="keywords" content="Permintaan Barang Pinago">
  <meta name="robots" content="noindex, noimageindex, nofollow, noarchive, nocache">
  <meta name="web_author" content="Permintaan Barang Pinago">
  <meta name="language" content="Indonesia">
  <meta property="og:title" content="Permintaan Barang Pinago" />
  <meta name="og:description" content="Permintaan Barang Pinago">

<script type="text/javascript" src="<?php echo(base_url());?>styles/jq/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo(base_url());?>assets/css/mystyle.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo(base_url());?>styles/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo(base_url());?>styles/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo(base_url());?>styles/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo(base_url());?>styles/css/font.css" type="text/css" />

  <link rel="stylesheet" href="<?php echo(base_url());?>styles/css/app.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="<?php echo(base_url());?>styles/js/ie/html5shiv.js"></script>
    <script src="<?php echo(base_url());?>styles/js/ie/respond.min.js"></script>
    <script src="<?php echo(base_url());?>styles/js/ie/excanvas.js"></script>
  <![endif]-->

  
  <link rel="stylesheet" href="<?php echo(base_url());?>styles/datatables/datatables.css" type="text/css"/>
  <link rel="stylesheet" href="<?php echo(base_url());?>styles/datatables/datatables.min.css" type="text/css"/>

 

</head>
<body>
  <section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        
        <a href="#" class="navbar-brand" data-toggle="fullscreen">
       
          <img style='background-color:white;' src="styles/images/logo.png" class=" img-circle"  >
               W2B Panel</a>
     
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <ul class="nav navbar-nav hidden-xs">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle dker" data-toggle="dropdown">
            <i class="fa fa-building-o"></i>
            <span class="font-bold">Activity</span>
          </a>
          <section class="dropdown-menu aside-xl on animated fadeInLeft no-borders lt">
           
            <div class="row m-l-none m-r-none m-b-n-xs text-center">
              <div class="col-xs-4">
                <div class="padder-v">
                  <span class="m-b-xs h4 block text-white">245</span>
                  <small class="text-muted">Followers</small>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <span class="m-b-xs h4 block text-white">245</span>
                  <small class="text-muted">Followers</small>
                </div>
              </div>
              <div class="col-xs-4 dk">
                <div class="padder-v">
                  <span class="m-b-xs h4 block text-white">55</span>
                  <small class="text-muted">Likes</small>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <span class="m-b-xs h4 block text-white">2,035</span>
                  <small class="text-muted">Photos</small>
                </div>
              </div>
            </div>
          </section>
        </li>
        <li>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
        
          <section class="dropdown-menu aside-xl">
          
          </section>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img style='background-color:white;' src="assets/images/users/<?php echo $this->session->userdata('user_id');  ?>">
            </span>
            <?php echo $this->session->userdata('user_name');  ?><b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">
            <li>
              <a href="<?php echo (base_url()); ?>"  >User Panel</a>
            </li>
            <span class="arrow top"></span>
            <li>
              <a href="signout"  >Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-dark lter aside-md hidden-print" id="nav">
          <section class="vbox">
            
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">

                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                  
                  <ul class="nav">
                    <li  >
                      <a href="welcome"   class="active">
                        <i class="fa fa-home icon">
                          <b class="bg-danger"></b>
                        </i>
                        <span>Home</span>
                      </a>
                    </li>
                    <li >
                      <a id='user' href="<?php echo(base_url()).'users';?>">
                        <i class="fa fa-users  icon">
                          <b class="bg-warning"></b>
                        </i>
                       <span class="pull-right">
                          </span>
                        <span>Users</span>
                      </a>
                      
                    <li >

                      <a href="requests"  >
                        <i class="fa fa-inbox icon">
                          <b class="bg-success"></b>
                        </i>
                        <span class="pull-right">
                        </span>
                        <span>Requests</span>
                      </a>
                     
                    </li>
                    <li >
                      <a href="offers"  >
                        <i class="fa fa-file-text icon">
                          <b class="bg-primary"></b>
                        </i>
                        <span class="pull-right">
                        </span>
                        <span>Offers</span>
                      </a>
                      
                    </li>
                    <li >
                      <a href="adverts"  >
                        <b class="badge bg-danger pull-right"></b>
                        <i class="fa fa-bullhorn icon">
                          <b class="bg-primary dker"></b>
                        </i>
                        <span>Advert</span>
                      </a>
                    </li>
                    <li >
                      <a href="payments"  >
                        <i class="fa fa-money  icon">
                          <b class="bg-info"></b>
                        </i>
                        <span>Payment</span>
                      </a>
                    </li>
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>

            <footer class="footer lt hidden-xs b-t b-dark">
              <div id="chat" class="dropup">
                <section class="dropdown-menu on aside-md m-l-n">
                  <section class="panel bg-white">
                    <header class="panel-heading b-b b-light">Active chats</header>
                    <div class="panel-body animated fadeInRight">
                      <p class="text-sm">No active chats.</p>
                      <p><a href="#" class="btn btn-sm btn-default">Start a chat</a></p>
                    </div>
                  </section>
                </section>
              </div>
              <div id="invite" class="dropup">
                <section class="dropdown-menu on aside-md m-l-n">
                  <section class="panel bg-white">
                    <header class="panel-heading b-b b-light">
                      John <i class="fa fa-circle text-success"></i>
                    </header>
                    <div class="panel-body animated fadeInRight">
                      <p class="text-sm">No contacts in your lists.</p>
                      <p><a href="#" class="btn btn-sm btn-facebook"><i class="fa fa-fw fa-facebook"></i> Invite from Facebook</a></p>
                    </div>
                  </section>
                </section>
              </div>
              <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                <i class="fa fa-angle-left text"></i>
                <i class="fa fa-angle-right text-active"></i>
              </a>
              <div class="btn-group hidden-nav-xs">
        
              </div>
            </footer>
          </section>
        </aside>