
  <section class="vbox">
    <section class="scrollable padder">
      <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo site_url()?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="requests"> <i class=""></i>Requests</a></li>
        <li class="active">Request Details</li>
      </ul>
      <section class="panel panel-default">
        <header class="panel-heading">
          Request Details
          <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
        </header>
        <div  class="panel-body">
        <?php 
        if($verification==1){$verificationt='Verified';}
	    elseif($verification==0){$verificationt='Unverified';}
	    elseif($verification==-1){$verificationt='Rejected';}

	        if($complete==1){$complete='Available';}
	        elseif($complete==0){$complete='Removed';}
	        elseif($complete==-1){$complete='Sold';}
	        else{
					$complete='Wronge';
	        }
	        ?>                                                                                    
        <div class="form-group">
              <label class="col-sm-2 control-label">User Name</label>
              <div class="col-sm-10">
                <input type="text" id="Name" name="Name" value="<?php echo($name); ?>"  placeholder="User Name" class="form-control" autocomplete="nope" readonly>
              </div><br><br>
            </div>                                      

            <div class="form-group">
              <label class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10">
                <input type="text" id="title" name="title" value="<?php echo($title); ?>"  placeholder="Title" class="form-control" autocomplete="nope" readonly>
              </div><br><br>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10">
                <textarea id="description" name="description" class="form-control" rows="6" data-minwords="6" placeholder="Description"  autocomplete="nope" readonly> <?php echo($description); ?>  </textarea><br>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Budget</label>
              <div class="col-sm-10">
                <input type="text" id="Budget" name="Budget" value="<?php echo( number_format($minimumBudget).' - '.number_format($maximumBudget)); ?> "  placeholder="Budget" class="form-control" autocomplete="nope" readonly><br>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Product Category</label>
              <div class="col-sm-10">
                <input type="text" id="Category" name="Category" value="<?php echo($productCategory); ?>"  placeholder="Product Category" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Request Category</label>
              <div class="col-sm-10">
                <input type="text" id="rCategory" name="rCategory" value="<?php echo($requestCategory); ?>"  placeholder="Request Category" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Location</label>
              <div class="col-sm-10">
                <input type="text" id="location" name="location" value="<?php echo($location); ?>"  placeholder="Location" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Request Date</label>
              <div class="col-sm-10">
                <input type="text" id="rDate" name="rDate" value="<?php echo($postingDate); ?>"  placeholder="Request Date" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Promotion Date</label>
              <div class="col-sm-10">
                <input type="text" id="pDate" name="pDate" value="<?php echo($promotedAt); ?>"  placeholder="Promotion Date" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">verfication Status</label>
              <div class="col-sm-10">
                <input type="text" id="status" name="<?php echo($verificationt); ?>" value="<?php echo($verification); ?>"  placeholder="verfication Status" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Verified date</label>
              <div class="col-sm-10">
                <input type="text" id="vdate" name="vdate" value="<?php echo($verifDate); ?>"  placeholder="PO Code" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

			<div class="form-group">
              <label class="col-sm-2 control-label">Availability</label>
              <div class="col-sm-10">
                <input type="text" id="complete" name="complete" value="<?php echo($complete); ?>"  placeholder="PO Code" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Verfication Message</label>
              <div class="col-sm-10">
                <textarea id="verifMessage" name="verifMessage" class="form-control" rows="6" data-minwords="6" placeholder="Catatan"  autocomplete="nope" > <?php echo($verifMessage); ?>  </textarea><br>
              </div>
            </div>

            <div class="btn-group" style="float: left;">
              <div class="btn-group hidden-nav-xs">
                    <button onClick="reply_click()" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                      Return
                    </button>
                  </div>
            </div>
            <div class="btn-group" style="float: right;margin-right: 5px">
                  <div style="padding: 3px" class="btn-group hidden-nav-xs">
                    <button onClick="reply_click()" id='<?php echo($idPosting); ?> ' name='reject' type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown">
                      Reject
                    </button>
                  </div>
                  <div style="padding: 3px" class="btn-group hidden-nav-xs">
                    <button onClick="reply_click()" id='<?php echo($idPosting); ?>' name='verify' type="button"  class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown">
                      Verify
                    </button>
                  </div>
                 
            </div>
           
         </section>
  </section>
</section>
