<section id="postBody" ><?php echo ($this->session->flashdata('verify')); ?>
	<div class="container" >
	<div class="ads-display col-md-9" >					
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs" >
					  <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
						<li role="presentation" class="active">
						  <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
							<span class="text">Posts</span>
						  </a>
						</li>
						
					  </ul>
					  <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">

<?php 	$cur_url=  $_SERVER['REQUEST_URI'];
		if(strpos($cur_url,'/searchposts/') or strpos($cur_url,'/allPosts/')):  ?>

							<div class="sort">
								 <div class="sort-by">

										<label>Sort By : </label>
										<select onchange="window.location.href = this.value;" >
											<option  value="recent">Most recent</option>
											<option value="pricelh">Price: Low to High</option>
											<option value="pricehl">Price: High to Low</option>
										
										</select>
										
									   </div>
									 </div>

<?php endif; ?>
						   <div>
						<div id="container">
								
								<div class="clearfix"></div>
							<ul id='postsList' class="list">

								<?php if (!empty($sponsors)) :?>
								<?php	foreach ($sponsors as $sponsor) :?>
								<a role='button' name="<?php echo $sponsor->idPosting; ?>" id='openPost' href='<?php echo(base_url());?>showpost/<?php echo($sponsor->idPosting);?>' >
									<li style='background-color: #FFFACD;'>
									<section class="list-left">
									<h5 class="title"><?php echo $sponsor->title; ?></h5>
									<span class="adprice"><?php echo number_format($sponsor->minimumBudget).' - '.number_format($sponsor->maximumBudget); ?></span>
									<p class="catpath"><?php echo $sponsor->productCategory .'»'. $sponsor->requestCategory?></p>
									</section>
									<section class="list-right">
									<span class="date"><?php echo $this->relative_time->ftime(strtotime($sponsor->postingDate),0); ?></span>
									<span class="cityname"><?php echo $sponsor->location; ?></span>
									<span class="date">Sponsored</span>
									</section>
									<div class="clearfix"></div>
									</li> 
								</a>
								<?php endforeach;?>
								<?php endif;?>

								<?php if (empty($posts)) :?>
								<li><span class='adprice' style='text-align:center;'>No Posts Available</span></li>
								<?php else:?>
								<?php	foreach ($posts as $post) :?>
								<a role='button'  name="openPost" id='openPost' href='<?php echo(base_url());?>showpost/<?php echo($post->idPosting);?>'>
									<li>
									<section class="list-left">
									<h5 class="title"><?php echo $post->title; ?></h5>
									<span class="adprice"><?php echo number_format($post->minimumBudget).' - '.number_format($post->maximumBudget); ?></span>
									<p class="catpath"><?php echo $post->productCategory .'»'. $post->requestCategory?></p>
									</section>
									<section class="list-right">
									<span class="date"><?php echo $this->relative_time->ftime(strtotime($post->postingDate),0); ?></span>
									<span class="cityname"><?php echo $post->location; ?></span>
									</section>
									<div class="clearfix"></div>
									</li> 
								</a>
								<?php endforeach;?>
								<?php endif;?>
								<div class='clearfix'></div>
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
			</div><div class='clearfix'></div>
</section>
