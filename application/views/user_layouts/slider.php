<div class="trend-ads" style="width: 90%;height: 240px;display:block;">
	<ul id="flexiselDemo3">
				
		<?php if (!empty($ads)) :?>
	
		<?php	foreach ($ads as $advert) :?>
			
			<li>
				<div class="col-md-12 biseller-column" style="height: 240px;">
					<a href="<?php echo $advert->url; ?>">
						<img height='180' src="<?php echo(base_url());?>assets/images/ads/<?php echo $advert->idAds; ?>" />
						<span class="price"><?php echo $advert->title; ?></span>
					</a> 
					<div class="ad-info">
						<h5><?php echo $advert->description; ?></h5>
						<span><?php echo $advert->title; ?></span>
					</div>
				</div>
			</li>									
		<?php endforeach;?>
	
		
		<?php endif;?>
	</ul><div class="clearfix"></div>
</div>  
 	
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo3").flexisel({
				visibleItems:1,	animationSpeed: 1000,
				autoPlay: true,	autoPlaySpeed: 5000,    		
				pauseOnHover: true,	enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,visibleItems:1
						}, 
					landscape: { 
						changePoint:640,visibleItems:1
									},
									tablet: { 
										changePoint:768,
										visibleItems:1
									}
								}
							});
							
						});
	</script>
	<script type="text/javascript" src="<?php echo(base_url());?>styles/resale_styles/js/jquery.flexisel.js"></script>
