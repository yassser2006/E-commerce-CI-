
  <section class="vbox">
    <section class="scrollable padder">
      <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo site_url()?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="adverts"> <i class=""></i>Advertisements</a></li>
        <li class="active">Editing</li>
      </ul>
      <section class="panel panel-default">
        <header class="panel-heading">
          Adverts
          <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
        </header>
        <?php foreach ($advs as $adv) :?>
        <div class="panel-body">
        <?php echo form_open_multipart('adsupdate'); ?>
		<input type="hidden" name="id" value="<?php echo($adv->idAds); ?>" />                                                                                                                           

            <div class="form-group">
              <label class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10">
                <input type="text" id="title" name="title" value="<?php echo($adv->title); ?>"  placeholder="PO Code" class="form-control" autocomplete="nope"  >
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10">
                <textarea id="description" name="description" class="form-control" rows="6" data-minwords="6" placeholder="Catatan"  autocomplete="nope" ><?php echo($adv->description); ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Link Url</label>
              <div class="col-sm-10">
                <input type="url" id="url" name="url" class="form-control" value="<?php echo($adv->url); ?>" placeholder="Kode Grup" class="form-control" autocomplete="nope" >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Advert Image</label>
              <div class="col-sm-10">
                <img  src="<?php echo('./assets/images/ads/'.$adv->idAds); ?>" style='width:100px'>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Advert Image</label>

              <div class="col-sm-10">
                <input type="file" id="userfile" name="userfile" class="form-control" value="" class="form-control" >
              </div>
            </div>
           
                <div style=" float: right; margin-right: 10px; padding: 5px;" class="btn-group hidden-nav-xs">
                  <button  type="submit" class="btn btn-sm btn-primary">
                    Edit
                  </button>
                </div>
          </form>
        <?php endforeach; ?>
        </div>
        <div style="color: red;padding-left: 30px;"> <?php echo validation_errors(); ?></div>
         </section>
  </section>
</section>
