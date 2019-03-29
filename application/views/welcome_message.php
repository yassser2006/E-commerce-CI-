
<section id="content">
  
  <section class="vbox">
    <section class="scrollable padder">
      <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      </ul>
      <section class="panel panel-default">
        <header class="panel-heading">
          Statistics
          <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
        </header>
        <div class="table-responsive">

          <div class="form-group">
            
          </div>
<section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-users fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="users">
                      <span class="h3 block m-t-xs"><strong><?php echo $users?></strong></span>
                      <small class="text-muted text-uc">Users</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-inbox fa-stack-1x text-white"></i>
                      <span class="easypiechart pos-abt" data-percent="0" data-line-width="4" data-track-Color="#fff" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="3000" data-target="#bugs" data-update=""></span>
                    </span>
                    <a class="clear" href="requests">
                      <span class="h3 block m-t-xs"><strong id="bugs"><?php echo $posts?></strong></span>
                      <small class="text-muted text-uc">Requests</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa fa-file-text fa-stack-1x text-white"></i>
                      <span class="easypiechart pos-abt" data-percent="0" data-line-width="4" data-track-Color="#f5f5f5" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="3000" data-target="#firers" data-update=""></span>
                    </span>
                    <a class="clear" href="offers">
                      <span class="h3 block m-t-xs"><strong id="firers"><?php echo $offers?></strong></span>
                      <small class="text-muted text-uc">Offers</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x icon-muted"></i>
                      <i class="fa fa-bullhorn fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="adverts">
                      <span class="h3 block m-t-xs"><strong><?php echo $ads?></strong></span>
                      <small class="text-muted text-uc">Advertisment</small>
                    </a>
                  </div>
                </div>
              </section>
    </section>
  </section>
</section>
 </section>