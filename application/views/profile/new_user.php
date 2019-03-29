
<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="head">Registration</h2>
			<div class="post-ad-form">
				<?php echo form_open_multipart('newUser'); ?> 
					<div style="color: red;padding-left: 30px;"> <?php echo validation_errors(); ?></div><div class="clearfix"></div>

					<label>User Name <span> *</span></label>
					<input type="text" class="name" name="name" placeholder="" required="">
					<div class="clearfix"></div>

					<label>Your Email Address<span> *</span></label>
					<input type="text" class="email" name="email" placeholder="" required>
					<div class="clearfix"></div>

					<label>Password<span> *</span></label>
					<input type="Password" class="phone" name="pwd" placeholder="" required>
					<div class="clearfix"></div>

					<label>Confirm Password<span> *</span></label>
					<input type="Password" class="phone" name="cpwd" placeholder="" required>
					<div class="clearfix"></div>

					
				<div class="personal-details">
				
					<input type="submit" value="Register">					
					<div class="clearfix"></div>
					</form>
					</div>
			</div>
		</div>	
	</div>