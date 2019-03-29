<div class="ads-grid" >
				<div class="side-bar col-md-3">
					
				
				<div class="featured-ads">
					<h2 class="sear-head fer">Featured Ads</h2>
					
					<?php if (!empty($ads)) :?>
					<?php	foreach ($ads as $advert) :?>

					<div class="featured-ad">
						<a href="<?php echo $advert->url; ?>">
							<div class="featured-ad-left">
								<img src="<?php echo(base_url());?>assets/images/ads/<?php echo $advert->idAds; ?>" title="ad image" alt="" />
							</div>
							<div class="featured-ad-right">
								<h4><?php echo $advert->description; ?></h4>
								<p><?php echo $advert->title; ?></p>
							</div>
							<div class="clearfix"></div>
						</a>
					</div>
					<?php endforeach;?>
					<?php endif;?>
				
				</div><div class="clearfix"></div>
				</div>
</div>