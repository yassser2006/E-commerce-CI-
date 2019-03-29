<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="head">Edit Account</h2>
			<div class="post-ad-form">
				<?php echo form_open_multipart('updateUser'); ?> 
				<?php foreach ($posts as $post) :?>

<div style="color: red;padding-left: 30px;"> <?php echo validation_errors(); ?></div><div class="clearfix"></div>

					<label>User Name <span>*</span></label>
					<input type="text" class="name" name='name' placeholder="" value="<?php echo $post->name; ?>">
					<div class="clearfix"></div>

					<label>Your Mobile No </label>
					<input type="text" class="phone" name='phone' placeholder="" value="<?php echo $post->phoneNumber; ?>">
					<div class="clearfix"></div>

					<label>Location</label>
					<input type="text" class="phone" name='location' placeholder="" value='<?php echo $post->location; ?>'>
					<div class="clearfix"></div>

					<label>Address</label>
					<input type="text" class="phone" name='address' placeholder="" value='<?php echo $post->address; ?>'>
					<div class="clearfix"></div>

					<label>Subscribe<span> </span></label>

		<select class="selectpicker" name="subscribe[]" multiple>
			<?php $subscribes=' '.$post->subscribes; ?>
			<option data-tokens="Bangka Belitung" <?php echo  strpos($subscribes, 'Bangka Belitung') != false?'selected="selected"':''; ?>
			>Bangka Belitung</option>

			<option data-tokens="Bali" <?php echo  strpos($subscribes, 'Bali') != false?'selected="selected"':''; ?>>Bali</option>

			<option data-tokens="Banten" <?php echo  strpos($subscribes, 'Banten') != false?'selected="selected"':''; ?>>Banten</option>

			<option data-tokens="Bengkulu" <?php echo  strpos($subscribes, 'Bengkulu') != false?'selected="selected"':''; ?>>Bengkulu</option>

			<option data-tokens="DKI Jakarta" <?php echo  strpos($subscribes, 'DKI Jakarta') != false?'selected="selected"':''; ?>>DKI Jakarta</option>

			<option data-tokens="DI Yogyakarta" <?php echo  strpos($subscribes, 'DI Yogyakarta') != false?'selected="selected"':''; ?>>DI Yogyakarta</option>

			<option data-tokens="Gorontalo" <?php echo  strpos($subscribes, 'Gorontalo') != false?'selected="selected"':''; ?>>Gorontalo</option>

			<option data-tokens="Jambi" <?php echo  strpos($subscribes, 'Jambi') != false?'selected="selected"':''; ?>>Jambi</option>

			<option data-tokens="Jawa Barat" <?php echo  strpos($subscribes, 'Jawa Barat') != false?'selected="selected"':''; ?>>Jawa Barat</option>

			<option data-tokens="Jawa Tengah" <?php echo  strpos($subscribes, 'Jawa Tengah') != false?'selected="selected"':''; ?>>Jawa Tengah</option>

			<option data-tokens="Jawa Timur" <?php echo  strpos($subscribes, 'Jawa Timur') != false?'selected="selected"':''; ?>>Jawa Timur</option>

			<option data-tokens="Kalimantan Barat" <?php echo  strpos($subscribes, 'Kalimantan Barat') != false?'selected="selected"':''; ?>>Kalimantan Barat</option>

			<option data-tokens="Kalimantan Selatan" <?php echo  strpos($subscribes, 'Kalimantan Selatan') != false?'selected="selected"':''; ?>>Kalimantan Selatan</option>

			<option data-tokens="Kalimantan Tengah" <?php echo  strpos($subscribes, 'Kalimantan Tengah') != false?'selected="selected"':''; ?>>Kalimantan Tengah</option>

			<option data-tokens="Kalimantan Timur" <?php echo  strpos($subscribes, 'Kalimantan Timur') != false?'selected="selected"':''; ?>>Kalimantan Timur</option>

			<option data-tokens="Lampung" <?php echo  strpos($subscribes, 'Lampung') != false?'selected="selected"':''; ?>>Lampung</option>

			<option data-tokens="Maluku" <?php echo  strpos($subscribes, 'Maluku') != false?'selected="selected"':''; ?>>Maluku</option>

			<option data-tokens="Maluku Utara" <?php echo  strpos($subscribes, 'Maluku Utara') != false?'selected="selected"':''; ?>>Maluku Utara</option>

			<option data-tokens="Nanggroe Aceh Darussalam" <?php echo  strpos($subscribes, 'Nanggroe Aceh Darussalam') != false?'selected="selected"':''; ?>>Nanggroe Aceh Darussalam</option>

			<option data-tokens="Nusa Tenggara Barat" <?php echo  strpos($subscribes, 'Nusa Tenggara Barat') != false?'selected="selected"':''; ?>>Nusa Tenggara Barat</option>

			<option data-tokens="Nusa Tenggara Timur" <?php echo  strpos($subscribes, 'Nusa Tenggara Timur') != false?'selected="selected"':''; ?>>Nusa Tenggara Timur</option>

			<option data-tokens="Papua" <?php echo  strpos($subscribes, 'Papua') != false?'selected="selected"':''; ?>>Papua</option>

			<option data-tokens="Papua Barat" <?php echo  strpos($subscribes, 'Papua Barat') != false?'selected="selected"':''; ?>>Papua Barat</option>

			<option data-tokens="Riau" <?php echo  strpos($subscribes, 'Riau') != false?'selected="selected"':''; ?>>Riau</option>

			<option data-tokens="Sulawesi Barat" <?php echo  strpos($subscribes, 'Sulawesi Barat') != false?'selected="selected"':''; ?> >Sulawesi Barat</option>

			<option data-tokens="Sulawesi Selatan" <?php echo  strpos($subscribes, 'Sulawesi Selatan') != false?'selected="selected"':''; ?>>Sulawesi Selatan</option>

			<option data-tokens="Sulawesi Tengah" <?php echo  strpos($subscribes, 'Sulawesi Tengah') != false?'selected="selected"':''; ?>>Sulawesi Tengah</option>

			<option data-tokens="Sulawesi Tenggara" <?php echo  strpos($subscribes, 'Sulawesi Tenggara') != false?'selected="selected"':''; ?>>Sulawesi Tenggara</option>

			<option data-tokens="Sulawesi Utara" <?php echo  strpos($subscribes, 'Sulawesi Utara') != false?'selected="selected"':''; ?>>Sulawesi Utara</option>

			<option data-tokens="Sumatera Barat" <?php echo  strpos($subscribes, 'Sumatera Barat') != false?'selected="selected"':''; ?>>Sumatera Barat</option>

			<option data-tokens="Sumatera Selatan" <?php echo  strpos($subscribes, 'Sumatera Selatan') != false?'selected="selected"':''; ?>>Sumatera Selatan</option>

			<option data-tokens="Sumatera Utara" <?php echo  strpos($subscribes, 'Sumatera Utara') != false?'selected="selected"':''; ?>>Sumatera Utara</option>			 
	  </select>

					
					<div class="clearfix"></div>

				<label>Photo<span>*</span></label>	
					<div class="photos-upload-view">

						<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

						<div>
							<input type="file" id="userfile" name="userfile" accept=".png"  />
						</div>
					<div class="clearfix"></div>
						<script src="<?php echo(base_url());?>styles/resale_styles/js/filedrag.js"></script>
				</div>
					<div class="personal-details">
				
					<input type="submit" value="Edit">					
					<div class="clearfix"></div>
					<?php endforeach; ?>
					</form>
					</div>
			</div>
		</div>	
	</div>