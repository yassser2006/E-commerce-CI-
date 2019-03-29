<div class="total-ads main-grid-border" >
		<div class="container" >
			<div class="select-box">
				<form method="post" action="<?php echo(base_url());?>searchposts/recent">
					<div class="browse-category ads-list">
					<label>Browse Categories</label>
					<select  data-live-search="true" name="category" >
					  <option data-tokens="All">All</option>
					  <option data-tokens="Rumah">Rumah</option>
					  <option data-tokens="Ruko">Ruko</option>
					  <option data-tokens="Tanah">Tanah</option>
					  <option data-tokens="Apartement">Apartemen</option>
					  <option data-tokens="Villa">Villa</option>
					  <option data-tokens="Office">Office</option>
					  <option data-tokens="Pabrik">Pabrik</option>
					  <option data-tokens="Gudang">Gudang</option>
					</select>
					</div>
					<div class="select-city-for-local-ads ads-list">
					<label>Select your location</label>
				<select name="location" class="selectpicker show-tick" data-live-search="true">
					<optgroup >
					  <option data-tokens="All">All</option>
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
				</div>
				
				<div class="search-product ads-list">
					<label>Your budget</label>
					<div class="search">
						<div id="custom-search-input">
						<div class="input-group">
							
							<input type="text" name="budget" id="currency-field"  value="" data-type="currency" class="form-control input-lg" placeholder="Rp 1,000,000.00">

							<span class="input-group-btn">
								<button id="searchPosts" name="searchPosts" class="btn btn-info btn-lg" type="submit">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</span>
						</div>
					</div>
					</div>

				</div>
				
			<div class="clearfix"></div>
			<div style="float: initial;">
			<!-- Default inline 1-->
  			<label style="padding: 20px;" >
				<input name="requestCategory[]" type="radio" value="Beli" checked>Beli
			</label>
			<label >
			    <input type="radio" name="requestCategory[]" value="Sewa" >Sewa
			</label>
			</div>
</form>
			
		</div></div></div>
	