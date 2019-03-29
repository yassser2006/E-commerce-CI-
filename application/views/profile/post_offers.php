	<div class="container">
  <div class="row row-centered" style="text-align:center;">
	<div class="ads-display col-md-12 " style="display:inline-block; float:none; margin-right:-4px;">
					<div class="wrapper" style="text-align:left;">					
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					  <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
						<li role="presentation" class="active">
						  <a href="#" id="home-tab" role="tab" aria-controls="home" aria-expanded="true">
							<span class="text">Post Offers</span>
						  </a>
					  </ul>
					  <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						   <div>
												<div id="container">
								
								<div class="clearfix"></div>
							<ul id='postsList' class="list">
								<?php if (empty($posts)){ 
									echo("<li><span class='adprice' style='text-align:center;'>No Offers Available</span></li>");
								}else {?>
								<?php	foreach ($posts as $post) :?>
								
									<li <?php if ($post->readAt=='') echo ('style="background: #D5F5E3;"'); ?> >
									<section class="list-left">
										<a role='button' name="link" id='openPost' href='<?php echo(base_url());?>comingOffer/<?php echo($post->idOffer);?>'>
									<h5 class="title"><?php echo $post->name; ?></h5>
									<span class="adprice"><?php echo $post->message; ?></span>
									</a>
									</section>
										
									<section class="list-right">
									<?php
									if (($accepted)=='0') :?>
										<a href='<?php echo(base_url());?>acceptOffer/<?php echo $post->idOffer; ?>' class='account pull-right'>
            							Accept
          							</a>
          							<?php endif;?>
									<span class="date">
										
          							<?php echo $this->relative_time->ftime(strtotime($post->createdAt),0); ?></span>
          							<?php if ($post->readAt=='') echo ('<span class="pull-right" style="color:red;">Not read</span>'); ?>
									<span class="cityname"></span>
									</section>
									<div class="clearfix"></div>
									</li> 
								
								<?php endforeach;?>
								<?php }?>
								<div class="clearfix"></div>
							</ul>
						<ul class="pagination pagination-sm"  id='pagination'>
							
							<?php if(!empty($links)){
							//foreach ($links as $link) {
								echo  $links;
							//
							 }?>

						</ul><div class="clearfix"></div>

							<a href="<?php echo(base_url());?>profile" id="home-tab" role="tab" aria-controls="home" aria-expanded="true">
							<span class="text">← Posts</span>
						  </a>
						</div>
						</div>
						
						</div>
						</div>
					</div>
				</div>
			</div>  </div>
</div>