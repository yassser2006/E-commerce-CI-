
<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="head">New Post</h2>
			<div class="post-ad-form">
				<form method="post" action="<?php echo(base_url());?>insertPost">
					
					<div style="color: red;padding-left: 30px;"> <?php echo validation_errors(); ?></div>
						
					<input type="hidden" name='id'  value="">	
					<label>Title <span>*</span></label>
					<input type="text" class="phone" name='title' placeholder="Title" value="" required>
					<div class="clearfix"></div>

					<label>Description <span>*</span></label>
					<textarea class="mess" name='description' placeholder="Write few lines about your product" required></textarea>
					<div class="clearfix"></div>

					<label>Minimum Budget <span>*</span></label>
					<input type="text" name="minimumBudget" id="currency-field" pattern="^\Rp \d{1,3}(,\d{3})*(\.\d+)?Rp" value="" data-type="currency" placeholder="Rp 1,000,000.00" required>
					<div class="clearfix"></div>

					<label>Maximum Budget <span>*</span></label>
					<input type="text" name="maximumBudget" id="currency-field" pattern="^\Rp \d{1,3}(,\d{3})*(\.\d+)?Rp" value="" data-type="currency" placeholder="Rp 1,000,000.00" required>
					<div class="clearfix"></div>

					<label>Location <span>*</span></label>
					<select name="location" class="show-tick" >
					<optgroup >
					  <option data-tokens="Bangka Belitung">Bangka Belitung</option>
					  <option data-tokens="Bali">Bali</option>
					  <option data-tokens="Banten">Banten</option>
					  <option data-tokens="Bengkulu">Bengkulu</option>
					  <option data-tokens="DKI Jakarta">DKI Jakarta</option>
					  <option data-tokens="DI Yogyakarta">DI Yogyakarta</option>
					  <option data-tokens="Gorontalo">Gorontalo</option>
					  <option data-tokens="Jambi">Jambi</option>
					  <option data-tokens="Jawa Barat">Jawa Barat</option>
					  <option data-tokens="Jawa Tengah">Jawa Tengah</option>
					  <option data-tokens="Jawa Timur">Jawa Timur</option>
					  <option data-tokens="Kalimantan Barat">Kalimantan Barat</option>
					  <option data-tokens="Kalimantan Selatan">Kalimantan Selatan</option>
					  <option data-tokens="Kalimantan Tengah">Kalimantan Tengah</option>
					  <option data-tokens="Kalimantan Timur">Kalimantan Timur</option>
					  <option data-tokens="Lampung">Lampung</option>
					  <option data-tokens="Maluku">Maluku</option>
					  <option data-tokens="Maluku Utara">Maluku Utara</option>
					  <option data-tokens="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
					  <option data-tokens="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
					  <option data-tokens="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
					  <option data-tokens="Papua">Papua</option>
					  <option data-tokens="Papua Barat">Papua Barat</option>
					  <option data-tokens="Riau">Riau</option>
					  <option data-tokens="Sulawesi Barat">Sulawesi Barat</option>
					  <option data-tokens="Sulawesi Selatan">Sulawesi Selatan</option>
					  <option data-tokens="Sulawesi Tengah">Sulawesi Tengah</option>
					  <option data-tokens="Sulawesi Tenggara">Sulawesi Tenggara</option>
					  <option data-tokens="Sulawesi Utara">Sulawesi Utara</option>
					  <option data-tokens="Sumatera Barat">Sumatera Barat</option>
					  <option data-tokens="Sumatera Selatan">Sumatera Selatan</option>
					  <option data-tokens="Sumatera Utara">Sumatera Utara</option>
						</optgroup>
												
			            </select>
					<div class="clearfix"></div>

					<label>Select Category <span>*</span></label>
					<select class="" name='productCategory'  >
					  <option >Rumah</option>
					  <option >Ruko</option>
					  <option >Tanah</option>
					  <option >Apartemen</option>
					  <option >Vila</option>
					  <option >Office</option>
					  <option >Pabrik</option>
					  <option >Gudang</option>
					</select>
					<div class="clearfix"></div>

					<label>Condition <span>*</span></label>
							
				<label ><input name="requestCategory" type="radio" name="optradio" value="Beli" checked>Beli
    			</label>
    			<label >
      			<input type="radio" name="requestCategory"  value="Sewa" >Sewa
    			</label>

				<div class="clearfix"></div>

					<input type="submit" value="Post">	
					<div class="clearfix"></div>
					</form>
					</div>
			</div>
		</div>	
	</div>