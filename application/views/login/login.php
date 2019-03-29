
<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
  <meta charset="utf-8" />
  <title>Permintaan Barang Pinago</title>
  <meta name="description" content="Permintaan Barang Pinago" />
  <meta name="keywords" content="Permintaan Barang Pinago">
  <meta name="robots" content="noindex, noimageindex, nofollow, noarchive, nocache">
  <meta name="web_author" content="Permintaan Barang Pinago">
  <meta name="language" content="Indonesia">
  <meta property="og:title" content="Permintaan Barang Pinago" />
  <!-- <meta property="og:image" content="http://localhost/dfg/styles/commingsoon/images/logo100.png" > -->
  <meta name="og:description" content="Permintaan Barang Pinago">
  <!-- <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/dfg/styles/commingsoon/images/logo100.png"> -->

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


<link rel="stylesheet" href="<?php echo(base_url());?>assets/css/mystyle.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo(base_url());?>styles/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo(base_url());?>styles/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo(base_url());?>styles/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo(base_url());?>styles/css/font.css" type="text/css" />

  <link rel="stylesheet" href="<?php echo(base_url());?>styles/css/app.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body>
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <div class="container aside-xxl">
      <a class="navbar-brand block" href="index">Want To Buy</a>
      <section class="panel panel-default bg-white m-t-lg">
        <header class="panel-heading text-center">
          <strong>Sign in</strong>
        </header>
        

       <?php echo form_open('Login/log_in',array('class' => 'panel-body wrapper-lg')); ?> 
          <div class="form-group">
            <label class="control-label">Email</label>
            <input type="email" id='email' name='email' placeholder="test@example.com" class="form-control input-lg" required>
          </div>
          <div class="form-group">
            <label class="control-label">Password</label>
            <input type="password" id="inputPassword" name="inputPassword" placeholder="Password" class="form-control input-lg" required>
          </div>
         <!-- <div class="checkbox">
            <label>
              <input type="checkbox"> Keep me logged in
            </label>
          </div>-->
          <?php echo ($this->session->flashdata('rejected')); ?>
          <?php echo ($this->session->flashdata('login_failed')); ?>
          
         <span style="color: red;"> <?php echo validation_errors(); ?></span>
         <button type="submit" class="btn btn-primary btn-block">Sign in</button><br>
         <div style="width: 100%;text-align: center;">
          <a href="<?php echo (base_url()); ?>Register">Sign up from here</a>
        </div>
        </form>
      </section>
    </div>

  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
       
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="<?php echo(base_url());?>styles/js/jquery.min.js"></script>
  <!-- Bootstrap -->
   <script src="<?php echo(base_url());?>styles/js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?php echo(base_url());?>styles/js/app.js"></script>
  <script src="<?php echo(base_url());?>styles/js/app.plugin.js"></script>
  <script src="<?php echo(base_url());?>styles/js/slimscroll/jquery.slimscroll.min.js"></script>

</body>
</html>
