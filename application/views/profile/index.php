<div class="container">
  <div class="row row-centered" style="text-align:center;">
	<div class="ads-display col-md-12 " style="display:inline-block; float:none; margin-right:-4px;">
					<div class="wrapper" style="text-align:left;">					
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					  <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
						<li role="presentation" class="active">
						  <a href="<?php echo(base_url());?>profile" id="home-tab" role="tab" aria-controls="home" aria-expanded="true">
							<span class="text">My Posts</span>
						  </a>
						</li>
						<li role="presentation" >
						  <a href="<?php echo(base_url());?>allMyOffers" role="tab" id="profile-tab" aria-controls="profile">
							<span class="text">My Offers</span>
						  </a>
						</li>
						<li role="presentation" >
						  <a href="<?php echo(base_url());?>subscriped" id="home-tab" role="tab" aria-controls="home" aria-expanded="true">
							<span class="text">Subscriped Posts</span>
						  </a>
						</li>
						<a style='float: right;' class="account" href="<?php echo(base_url());?>account">Profile</a>
					  </ul>

					  <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						   <div id="container">
									<ul id='postsList' class="list">
												
								
								<div class="clearfix"></div>
							
								<?php if (empty($posts)):?>
									<li>
									<span class='adprice' style='text-align:center;'>No Offers Available</span></li>
								<?php else :?>
									
								<?php	foreach ($posts as $post) :?>
								
									<li <?php if ($post->complete==1) echo ('style="background: #C2FCDB;"'); ?><?php if ($post->verification==0) echo ('style="background: #F1948A;"'); ?>>
										<div class="pull-left" style="height:100%;width:5%;background: red;"><span></span></div>
									<section class="list-left">

										<a role='button' href='<?php echo(base_url());?>showpost/<?php echo($post->idPosting);?>'>
									<h5 class="title"><?php echo $post->title; ?></h5></a>
									<span class="adprice"><?php echo number_format($post->minimumBudget).' - '.number_format($post->maximumBudget); ?></span>
									<p class="catpath"><?php echo $post->productCategory .'»'. $post->requestCategory?></p>
									<?php if ($post->verification==0) echo ('<span class="pull-right" style="color:red;">Waiting Verification</span>'); ?>
									<?php if ($post->verification==-1){ 
									echo ('<span class="pull-right" style="color:red;">'.$post->verifMessage.'</span>'); }?>
									<?php if ($post->complete==1) echo ('<span class="pull-right" style="color:#03B24F;">Sold</span>'); ?>
									</section>
									<section class="list-right">
				


									<span class="date"><?php echo $this->relative_time->ftime(strtotime($post->postingDate),0); ?></span>
									<span class="cityname"><?php echo $post->location; ?></span>

				<div class="btn-group" style="padding-top: 15px">
	               <button type="button" class="dropbtn" data-toggle="dropdown">
	                    Action
	               <span class="caret"></span>
	               </button>
	                <ul class="dropdown-menu text-left">
	                  
	                  <div class="listItem"><a href="<?php echo(base_url());?>postOffer/<?php echo($post->idPosting);?>">Offers</a></div>
	                  <div class="listItem"><a href="<?php echo(base_url());?>editPost/<?php echo($post->idPosting);?>" >Edit</a></div>
	                  <div class="listItem"><a href="<?php echo(base_url());?>deletePost/<?php echo($post->idPosting);?>">Delete</a></div>
	                  <?php if ($post->verification==1) :?>
	                  <div class="listItem" ><a href="<?php echo(base_url());?>promotePost/<?php echo($post->idPosting);?>" <?php if(($post->promotedAt)>date('Y-m-d H:i:s', strtotime('-1 week'))){echo 'style="display: none;"';}?> >Promote</a></div>
	                  <?php endif;?>
	                    
	                </ul>
	             </div>
									</section>
									<div class="clearfix"></div>
									</li> 
								
								<?php endforeach;?>
								
								<?php endif;?>
								</ul>
						</div>
					</div><div class="clearfix"></div>
							
	<ul class="pagination pagination-sm"  id='pagination'>
							
		<?php if(!empty($links)){
		//foreach ($links as $link) {
			echo  $links;
			//
		 }?>
	</ul>
	</div>
	</div>
	</div>
	</div>  
	</div>
</div>