
<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="head">Edit Post</h2>
			<div class="post-ad-form">
				<form method="post" action="<?php echo(base_url());?>doUpdate">
					<?php if (!empty($posts)) :?>
					<?php	foreach ($posts as $post) :?>
					<input type="hidden" name='id'  value="<?php echo $post->idPosting; ?>">	
					<label>Title <span>*</span></label>
					<input type="text" class="phone" name='title' placeholder="Title" value="<?php echo $post->title; ?>" required>
					<div class="clearfix"></div>

					<label>Description <span>*</span></label>
					<textarea class="mess" name='description' placeholder="Write few lines about your product" required><?php echo $post->description; ?></textarea>
					<div class="clearfix"></div>

					<label>Minimum Budget <span>*</span></label>
					<input type="text" name="minimumBudget" id="currency-field" pattern="^\Rp \d{1,3}(,\d{3})*(\.\d+)?Rp" value="<?php echo 'Rp '.number_format($post->minimumBudget); ?>" data-type="currency" placeholder="Rp 1,000,000.00" required>
					<div class="clearfix"></div>

					<label>Maximum Budget <span>*</span></label>
					<input type="text" name="maximumBudget" id="currency-field" pattern="^\Rp \d{1,3}(,\d{3})*(\.\d+)?Rp" value="<?php echo 'Rp '.number_format($post->maximumBudget); ?>" data-type="currency" placeholder="Rp 1,000,000.00" required>
					<div class="clearfix"></div>

					<label>Location <span>*</span></label>
					<select name="location" class="show-tick" >
					<optgroup >
					  <option data-tokens="Bangka Belitung" <?php echo  ( $post->location== 'Bangka Belitung')  ?'selected="selected"':''; ?>
			>Bangka Belitung</option>

			<option data-tokens="Bali" <?php echo  ($post->location== 'Bali') ?'selected="selected"':''; ?>>Bali</option>

			<option data-tokens="Banten" <?php echo  ($post->location== 'Banten')  ?'selected="selected"':''; ?>>Banten</option>

			<option data-tokens="Bengkulu" <?php echo  ( $post->location== 'Bengkulu')  ?'selected="selected"':''; ?>>Bengkulu</option>

			<option data-tokens="DKI Jakarta" <?php echo  ( $post->location== 'DKI Jakarta')  ?'selected="selected"':''; ?>>DKI Jakarta</option>

			<option data-tokens="DI Yogyakarta" <?php echo  ( $post->location== 'DI Yogyakarta')  ?'selected="selected"':''; ?>>DI Yogyakarta</option>

			<option data-tokens="Gorontalo" <?php echo  ( $post->location== 'Gorontalo')  ?'selected="selected"':''; ?>>Gorontalo</option>

			<option data-tokens="Jambi" <?php echo  ( $post->location== 'Jambi')  ?'selected="selected"':''; ?>>Jambi</option>

			<option data-tokens="Jawa Barat" <?php echo  ( $post->location== 'Jawa Barat')  ?'selected="selected"':''; ?>>Jawa Barat</option>

			<option data-tokens="Jawa Tengah" <?php echo  ( $post->location== 'Jawa Tengah')  ?'selected="selected"':''; ?>>Jawa Tengah</option>

			<option data-tokens="Jawa Timur" <?php echo  ( $post->location== 'Jawa Timur')  ?'selected="selected"':''; ?>>Jawa Timur</option>

			<option data-tokens="Kalimantan Barat" <?php echo  ( $post->location== 'Kalimantan Barat')  ?'selected="selected"':''; ?>>Kalimantan Barat</option>

			<option data-tokens="Kalimantan Selatan" <?php echo  ( $post->location== 'Kalimantan Selatan')  ?'selected="selected"':''; ?>>Kalimantan Selatan</option>

			<option data-tokens="Kalimantan Tengah" <?php echo  ( $post->location== 'Kalimantan Tengah')  ?'selected="selected"':''; ?>>Kalimantan Tengah</option>

			<option data-tokens="Kalimantan Timur" <?php echo  ( $post->location== 'Kalimantan Timur')  ?'selected="selected"':''; ?>>Kalimantan Timur</option>

			<option data-tokens="Lampung" <?php echo  ( $post->location== 'Lampung')  ?'selected="selected"':''; ?>>Lampung</option>

			<option data-tokens="Maluku" <?php echo  ( $post->location== 'Maluku')  ?'selected="selected"':''; ?>>Maluku</option>

			<option data-tokens="Maluku Utara" <?php echo  ( $post->location== 'Maluku Utara')  ?'selected="selected"':''; ?>>Maluku Utara</option>

			<option data-tokens="Nanggroe Aceh Darussalam" <?php echo  ( $post->location== 'Nanggroe Aceh Darussalam')  ?'selected="selected"':''; ?>>Nanggroe Aceh Darussalam</option>

			<option data-tokens="Nusa Tenggara Barat" <?php echo  ( $post->location== 'Nusa Tenggara Barat')  ?'selected="selected"':''; ?>>Nusa Tenggara Barat</option>

			<option data-tokens="Nusa Tenggara Timur" <?php echo  ( $post->location== 'Nusa Tenggara Timur')  ?'selected="selected"':''; ?>>Nusa Tenggara Timur</option>

			<option data-tokens="Papua" <?php echo  ( $post->location== 'Papua')  ?'selected="selected"':''; ?>>Papua</option>

			<option data-tokens="Papua Barat" <?php echo  ( $post->location== 'Papua Barat')  ?'selected="selected"':''; ?>>Papua Barat</option>

			<option data-tokens="Riau" <?php echo  ( $post->location== 'Riau')  ?'selected="selected"':''; ?>>Riau</option>

			<option data-tokens="Sulawesi Barat" <?php echo  ( $post->location== 'Sulawesi Barat')  ?'selected="selected"':''; ?> >Sulawesi Barat</option>

			<option data-tokens="Sulawesi Selatan" <?php echo  ( $post->location== 'Sulawesi Selatan')  ?'selected="selected"':''; ?>>Sulawesi Selatan</option>

			<option data-tokens="Sulawesi Tengah" <?php echo  ( $post->location== 'Sulawesi Tengah')  ?'selected="selected"':''; ?>>Sulawesi Tengah</option>

			<option data-tokens="Sulawesi Tenggara" <?php echo  ( $post->location== 'Sulawesi Tenggara')  ?'selected="selected"':''; ?>>Sulawesi Tenggara</option>

			<option data-tokens="Sulawesi Utara" <?php echo  ( $post->location== 'Sulawesi Utara')  ?'selected="selected"':''; ?>>Sulawesi Utara</option>

			<option data-tokens="Sumatera Barat" <?php echo  ( $post->location== 'Sumatera Barat')  ?'selected="selected"':''; ?>>Sumatera Barat</option>

			<option data-tokens="Sumatera Selatan" <?php echo  ( $post->location== 'Sumatera Selatan')  ?'selected="selected"':''; ?>>Sumatera Selatan</option><

			<option data-tokens="Sumatera Utara" <?php echo  ( $post->location== 'Sumatera Utara')  ?'selected="selected"':''; ?>>Sumatera Utara</option>			 
			</optgroup>
												
		</select><div class="clearfix"></div>


					<label>Select Category <span>*</span></label>
					<select class="" name='productCategory' <?php $p="selected='selected'"; ?> >
					  <option <?php echo($post->productCategory=='Rumah')?($p):''; ?>>Rumah</option>
					  <option <?php echo($post->productCategory=='Ruko')?($p):''; ?>>Ruko</option>
					  <option <?php echo($post->productCategory=='Tanah')?($p):''; ?>>Tanah</option>
					  <option <?php echo($post->productCategory=='Apartemen')?($p):''; ?>>Apartemen</option>
					  <option <?php echo($post->productCategory=='Vila')?($p):''; ?>>Vila</option>
					  <option <?php echo($post->productCategory=='Office')?($p):''; ?>>Office</option>
					  <option <?php echo($post->productCategory=='Pabrik')?($p):''; ?>>Pabrik</option>
					  <option <?php echo($post->productCategory=='Gudang')?($p):''; ?>>Gudang</option>
					</select>
					<div class="clearfix"></div>

					<label>Condition <span>*</span></label>
							
				<label ><input name="requestCategory" <?php echo($post->requestCategory == 'Beli') ? 'checked' :''; ?> type="radio" name="optradio" value="Beli" >Beli
    			</label>
    			<label >
      			<input type="radio" name="requestCategory" <?php echo($post->requestCategory == 'Sewa') ? 'checked' :''; ?> value="Sewa" >Sewa
    			</label>

				<div class="clearfix"></div>
			


					<?php endforeach;?>
					<?php endif;?>
					<input type="submit" value="Post">	
					<div class="clearfix"></div>
					<div style="color: red;padding-left: 30px;"> <?php echo validation_errors(); ?></div>
						</form>
					</div>
			</div>
		</div>	
	</div>