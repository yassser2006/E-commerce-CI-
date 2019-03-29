 <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-users  fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong><?php echo $allusers?></strong></span>
                      <small class="text-muted text-uc">Users</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-primary"></i>
                      <i class="fa fa-check-circle fa-stack-1x text-white"></i>
                      <span class="easypiechart pos-abt" data-percent="0" data-line-width="4" data-track-Color="#fff" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="3000" data-target="#bugs" data-update=""></span>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong id="bugs"><?php echo $active?></strong></span>
                      <small class="text-muted text-uc">Active</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-clock-o fa-stack-1x text-white"></i>
                 
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong id="firers"><?php echo $notactive?></strong></span>
                      <small class="text-muted text-uc">Wainting</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa  fa-ban fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong><?php echo $banned?></strong></span>
                      <small class="text-muted text-uc">Banned</small>
                    </a>
                  </div>
                </div>
      </section>