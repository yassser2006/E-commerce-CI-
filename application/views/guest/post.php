<div class="single-page main-grid-border">
		<div class="container">
			<ol class="breadcrumb" style="margin-bottom: 5px;">
				<li><a href="<?php echo(base_url());?>">Home</a></li>
				<li class="active"><?php echo($post->title); ?></li>
			</ol>

			<div class="product-desc">
				<div class="col-md-7 product-view">
					<h2></h2>
					<p> <i class="glyphicon glyphicon-map-marker"></i><a href="#"><?php echo($post->location); ?></a> </p>
					
					<!-- //FlexSlider -->
					<div class="product-details">
						<h4>Ads Poster : <a href="#"><?php echo($post->name); ?></a></h4>
						<p><strong>Title </strong><?php echo($post->title); ?></p>
						<p><strong>Date </strong><?php echo($post->postingDate); ?></p>
						<p><strong>Description</strong> <?php echo($post->description); ?></p>
						<p><strong>Views</strong> <?php echo($post->views); ?></p>
					</div>
<div class="clearfix"></div><hr>
<?php 
			$logged=$this->session->userdata('logged_in');
			$id=$this->session->userdata('user_id');
			if($logged&&$id!=$post->idUser) : ?>
<h2 class="head">Make Offer</h2>
			<div class="post-ad-form">
				 <?php echo form_open_multipart('makeOffer'); ?>

<div style="color: red;padding-left: 30px;"> <?php echo validation_errors(); ?></div><div class="clearfix"></div>
					<input type="hidden"  name="title" value="<?php echo($post->title); ?>" />

					<label>Your message </label>
					<textarea class="mess" name="message" placeholder="Write few lines about your offer" required></textarea>
					<div class="clearfix"></div>

				<label>Document</label>	
					<div class="photos-upload-view">

						<input type="hidden" id="idPost" name="idPost" value="<?php echo($post->idPosting); ?>" />

						<div>
							<input type="file" id="userfile" name="userfile" accept=".pdf" required/>
						</div>
				</div>
				<label></label>	
					<div class="photos-upload-view">
						<div style="color: red;padding-left: 30px;"><?php echo ($this->session->flashdata('Upload')); ?></div>
					</div>
					<div class="personal-details">
				
					<input type="submit" value="Offer">					
					<div class="clearfix"></div>
					</div>
				</div>
					</form>
				
			<?php elseif(!$logged) : ?>
			<a href="<?php echo (base_url()); ?>signin" class="account " style="margin-right: 10px;"  >
            Make an Offer
          </a>
      <?php endif; ?>
				
</div>
				<div class="col-md-5 product-details-grid">
					<div class="item-price">
						<div class="product-price">
							<p class="p-price">Price</p>
							<h4><?php echo( number_format($post->minimumBudget).' - '.number_format($post->maximumBudget)); ?></h4>
							<div class="clearfix"></div>
						</div>
						<div class="condition">
							<p class="p-price">Condition</p>
							<h4><?php echo($post->requestCategory); ?></h4>
							<div class="clearfix"></div>
						</div>
						<div class="itemtype">
							<p class="p-price">Item Type</p>
							<h4><?php echo($post->productCategory); ?></h4>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="interested text-center">
						<h4>Interested in this Ad?<small> Contact the Seller!</small></h4>
						<p><i class="glyphicon glyphicon-earphone"></i><?php echo($post->phoneNumber); ?></p>
					</div>
						<div class="tips">
						<h4>Safety Tips for Buyers</h4>
							<ol>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
							</ol>
						</div>
				</div>
			<div class="clearfix"></div>
			</div>
		</div>
	</div>