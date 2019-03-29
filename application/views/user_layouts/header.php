<!--<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Want To Buy</title>
  <meta name="description" content="Permintaan Barang Pinago" />
  <meta name="keywords" content="Permintaan Barang Pinago">
  <meta name="robots" content="noindex, noimageindex, nofollow, noarchive, nocache">
  <meta name="web_author" content="Permintaan Barang Pinago">
  <meta name="language" content="Indonesia">
  <meta property="og:title" content="Permintaan Barang Pinago" />
  <meta name="og:description" content="Permintaan Barang Pinago">
-->
<!DOCTYPE html>
<html>
<head>
<title>Want To Buy</title>
<link rel="stylesheet" href="<?php echo(base_url());?>styles/resale_styles/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo(base_url());?>styles/resale_styles/css/bootstrap-select.css">
<link href="<?php echo(base_url());?>styles/resale_styles/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo(base_url());?>styles/resale_styles/css/jquery-ui1.css">
<link rel="stylesheet" href="<?php echo(base_url());?>styles/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo(base_url());?>styles/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo(base_url());?>styles/css/font.css" type="text/css" />

<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="SIS" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!--fonts-->
<link href="<?php echo(base_url());?>styles/resale_styles/css/fontfamilyubuntu.css" rel='stylesheet' type='text/css'>
<link href="<?php echo(base_url());?>styles/resale_styles/css/FontOpenSans.css" type='text/css'>
<!--//fonts-->	
<!-- js -->
<script type="text/javascript" src="<?php echo(base_url());?>styles/resale_styles/js/jquery.min.js"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo(base_url());?>styles/resale_styles/js/bootstrap.min.js"></script>
<script src="<?php echo(base_url());?>styles/resale_styles/js/bootstrap-select.js"></script><script src="<?php echo(base_url());?>styles/resale_styles/js/currency.js"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });

    if( <?php echo($this->session->userdata('logged_in'));?>){
    (function(){

      $.ajax({
        url: '<?php echo(base_url());?>checkNotification',
        type: 'POST',
        success: function(data){ 
         //alert(data.notifications);
         $notification =data.notifications;
         if($notification==0){
            $notification ='';
         }
         if($notification==null){
            $notification ='';
         }
         if($notification>=10){
            $notification ='+9';
         }
          document.getElementById("noti").innerHTML = $notification;
        },
        error: function(data) {
          //alert(data);
        }
     });
    setTimeout(arguments.callee, 120000);
    })();
}

  });


</script>
<script type="text/javascript" src="<?php echo(base_url());?>styles/resale_styles/js/jquery.leanModal.min.js"></script>
<link href="<?php echo(base_url());?>styles/resale_styles/css/jquery.uls.css" rel="stylesheet"/>
<link href="<?php echo(base_url());?>styles/resale_styles/css/jquery.uls.grid.css" rel="stylesheet"/>
<link href="<?php echo(base_url());?>styles/resale_styles/css/jquery.uls.lcd.css" rel="stylesheet"/>
<!-- Source -->
<script src="<?php echo(base_url());?>styles/resale_styles/js/jquery.uls.data.js"></script>
<script src="<?php echo(base_url());?>styles/resale_styles/js/jquery.uls.data.utils.js"></script>
<script src="<?php echo(base_url());?>styles/resale_styles/js/jquery.uls.lcd.js"></script>
<script src="<?php echo(base_url());?>styles/resale_styles/js/jquery.uls.languagefilter.js"></script>
<script src="<?php echo(base_url());?>styles/resale_styles/js/jquery.uls.regionfilter.js"></script>
<script src="<?php echo(base_url());?>styles/resale_styles/js/jquery.uls.core.js"></script>
	
</head>
<body>
<div class="header" style="background-color: #F7F9F9;">
		<div class="container">
			<div class="logo">
				<a href="<?php echo(base_url());?>index"><span>Want To</span> Buy</a>

			</div>

			<div class="header-right">
        <span class="" style="margin-right: 20px;">
		<?php 
			$stat=$this->session->userdata('status');
			if($stat!='Ok')echo ($stat); ?></span>
		<?php $userName=$this->session->userdata('user_name');
			$logged=$this->session->userdata('logged_in'); 
			$notifications=$this->session->userdata('notification'); 
			if($notifications>=100)$notifications='99+';
			if($notifications<=0)$notifications='';
      if($notifications==null)$notifications='';
			if(!$logged): ?>

		
          <a href="<?php echo (base_url()); ?>signin" class="account " style="margin-right: 10px;"  >
            Login
          </a>
          <a href="<?php echo (base_url()); ?>Register " class="account "  >
            Register
          </a>
          
		<?php else: ?>

		<li class="dropdown" style="padding-right: 5px;">
          <a href="#" class="account dropdown-toggle" data-toggle="dropdown">
            
            <?php echo($userName); ?><b id="noti" class="badge bg-danger pull-right"><?php echo($notifications); ?></b> 
          </a>
          <ul class="dropdown-menu animated fadeInRight">
            <span class="arrow top"></span>
            <li>
              <a href="<?php echo (base_url()); ?>subscriped">
                <span id="noti" class="badge bg-danger pull-right"><?php echo($notifications); ?></span>
                Notifications
              </a>
            </li>
            <li>
              <a href="<?php echo (base_url()); ?>profile">My Posts</a>
            </li>
            <li>
              <li>
              <a href="<?php echo (base_url()); ?>allMyOffers">My Offers</a>
            </li>
            </li>
            <li>
              <a href="<?php echo (base_url()); ?>account">My account</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="<?php echo (base_url()); ?>signout" data-toggle="ajaxModal" >Logout</a>
            </li>
          </ul>
        </li>
        
		
		<?php endif; ?>
    <a href="<?php echo (base_url()); ?>newPost" class="account pull-right"  >
      <span class="glyphicon glyphicon-plus"></span>  Post
    </a>
			<!-- Large modal -->
			
		</div>
	</div>
</div><div class="clearfix"></div>
	
