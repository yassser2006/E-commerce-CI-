
					

<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="head">Edit Account</h2>
			<div class="post-ad-form">
				<?php echo form_open_multipart('updatePassword'); ?> 
		

<div style="color: red;padding-left: 30px;"> <?php echo validation_errors(); ?></div><div class="clearfix"></div>

					<input type="hidden" class="phone" name='vpwd' placeholder="" value="h">

					<label>Old Password<span>*</span></label>
					<input type="password" class="phone" name='opwd' placeholder="">
					<div class="clearfix"></div>

					<label>New Password<span>*</span></label>
					<input type="password" class="phone" name='pwd' placeholder="">
					<div class="clearfix"></div>

					<label>Confirm Password<span>*</span></label>
					<input type="password" class="phone" name='cpwd' placeholder="">
					<div class="clearfix"></div>
					<div class="personal-details">
				
					<input type="submit" value="Edit">					
					<div class="clearfix"></div>
		
					</form>
					</div>
			</div>
		</div>	
	</div>