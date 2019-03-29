<div class="container">
  <div class="row row-centered" style="text-align:center;">
	<div class="ads-display col-md-12 " style="display:inline-block; float:none; margin-right:-4px;">
					<div class="wrapper" style="text-align:left;">					
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					  <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
						<li role="presentation" >
						  <a href="<?php echo(base_url());?>profile" id="home-tab" role="tab" aria-controls="home" aria-expanded="true">
							<span class="text">My Posts</span>
						  </a>
						</li>
						<li role="presentation" >
						  <a href="<?php echo(base_url());?>allMyOffers" role="tab" id="profile-tab" aria-controls="profile">
							<span class="text">My Offers</span>
						  </a>
						</li>
						<li role="presentation" class="active">
						  <a href="<?php echo(base_url());?>subscriped" id="home-tab" role="tab" aria-controls="home" aria-expanded="true">
							<span class="text">Subscriped Posts</span>
						  </a>
						</li>
						<a style='float: right;' class="account" href="<?php echo(base_url());?>account">Profile</a>
					  </ul>

					  <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						   <div>
						<div id="container">
								
								<div class="clearfix"></div>
							<ul id='postsList' class="list">
								<?php if (empty($posts)){ 
									echo("<li><span class='adprice' style='text-align:center;'>No Posts Available</span></li>");
								}else {?>
								<?php	foreach ($posts as $post) :?>
								
									<li <?php if ($post->status==0) echo ('style="background: #D5F5E3;"'); ?>>
									<section class="list-left">
										<a role='button' href='<?php echo(base_url());?>showpost/<?php echo($post->idPosting);?>'>
									<h5 class="title"><?php echo $post->title; ?></h5></a>
									<span class="adprice"><?php echo number_format($post->minimumBudget).' - '.number_format($post->maximumBudget); ?></span>
									<p class="catpath"><?php echo $post->productCategory .'»'. $post->requestCategory?></p>

									</section>
									<section class="list-right">
				


									<span class="date"><?php echo $this->relative_time->ftime(strtotime($post->postingDate),0); ?></span>
									<span class="cityname"><?php echo $post->location; ?></span>

									<?php if ($post->status==0) echo ('<span class="pull-right" style="color:red;">Not read</span>'); ?>
									</section>
									<div class="clearfix"></div>
									</li> 
								
								<?php endforeach;?>
								<?php }?>
								<div class="clearfix"></div>
							</ul>
						</div>
						</div>
						</div>
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
			</div>  </div>
</div>