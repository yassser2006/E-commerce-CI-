
<section id="content" style="display: none">
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
        <input type="hidden" id="idPosting" value="" />                                                        
        <div class="form-group">
              <label class="col-sm-2 control-label">User Name</label>
              <div class="col-sm-10">
                <input type="text" id="name" name="Name" value=""  placeholder="User Name" class="form-control" autocomplete="nope" readonly>
              </div><br><br>
            </div>                                      

            <div class="form-group">
              <label class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10">
                <input type="text" id="title" name="title" value=""  placeholder="Title" class="form-control" autocomplete="nope" readonly>
              </div><br><br>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10">
                <textarea id="description" name="description" class="form-control" rows="6" data-minwords="6" placeholder="Description"  autocomplete="nope" readonly>   </textarea><br>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Budget</label>
              <div class="col-sm-10">
                <input type="text" id="Budget" name="Budget" value=""  placeholder="Budget" class="form-control" autocomplete="nope" readonly><br>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Product Category</label>
              <div class="col-sm-10">
                <input type="text" id="Category" name="Category" value=""  placeholder="Product Category" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Request Category</label>
              <div class="col-sm-10">
                <input type="text" id="rCategory" name="rCategory" value=""  placeholder="Request Category" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Location</label>
              <div class="col-sm-10">
                <input type="text" id="location" name="location" value=""  placeholder="Location" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Request Date</label>
              <div class="col-sm-10">
                <input type="text" id="rDate" name="rDate" value=""  placeholder="Request Date" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Promotion Date</label>
              <div class="col-sm-10">
                <input type="text" id="pDate" name="pDate" value=""  placeholder="Promotion Date" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">verfication Status</label>
              <div class="col-sm-10">
                <input type="text" id="status" name="status" value=""  placeholder="verfication Status" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Verified date</label>
              <div class="col-sm-10">
                <input type="text" id="vdate" name="vdate" value=""  placeholder="PO Code" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

      <div class="form-group">
              <label class="col-sm-2 control-label">Availability</label>
              <div class="col-sm-10">
                <input type="text" id="complete" name="complete" value=""  placeholder="Availability" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Verfication Message</label>
              <div class="col-sm-10">
                <textarea id="verifMessage" name="verifMessage" class="form-control" rows="6" data-minwords="6" placeholder="Verfication Message"  autocomplete="nope" >   </textarea><br>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Sponsored Date</label>
              <div class="col-sm-10">
                <input type="text" id="sponsorDate" name="sponsorDate" value=""  placeholder="Availability" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Sponsored</label>
              <div class="col-sm-10">
                <input type="text" id="sponsor" name="sponsor" value=""  placeholder="Availability" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Number of Views</label>
              <div class="col-sm-10">
                <input type="text" id="views" name="views" value=""  placeholder="Availability" class="form-control" autocomplete="nope" readonly><br>
              </div><br><br>
            </div>

            
            <div class="btn-group" style="float: left;">
              <div class="btn-group hidden-nav-xs">
                    <button onClick="reply_click()" id='13' name='return' type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                      Return
                    </button>
                  </div>
            </div>
            <div class="btn-group" style="float: right;margin-right: 5px">
                  <div style="padding: 3px" class="btn-group hidden-nav-xs">
                    <button onClick="reply_click()" id='1' name='reject' type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown">
                      Reject
                    </button>
                  </div>
                  <div style="padding: 3px" class="btn-group hidden-nav-xs">
                    <button onClick="reply_click()" id='2' name='verify' type="button"  class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown">
                      Verify
                    </button>
                  </div>
                 
            </div>
           
         </section>
  </section>
</section>

</section>
<section id="content1">
  <section class="vbox">
    <section class="scrollable padder">
      <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo site_url()?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Posts</li>
      </ul>
      <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-4 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-inbox   fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span id='allreqs' class="h3 block m-t-xs"><strong><?php echo $allreqs?></strong></span>
                      <small class="text-muted text-uc">Posts</small>
                    </a>
                  </div>
                  <div class="col-sm-4 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-primary"></i>
                      <i class="fa fa-check-circle fa-stack-1x text-white"></i>
                      <span class="easypiechart pos-abt" data-percent="0" data-line-width="4" data-track-Color="#fff" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="3000" data-target="#bugs" data-update=""></span>
                    </span>
                    <a class="clear" href="#">
                      <span id='verified' class="h3 block m-t-xs"><strong id="bugs"><?php echo $verified?></strong></span>
                      <small class="text-muted text-uc">Verified</small>
                    </a>
                  </div>
                  <div class="col-sm-4 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-clock-o fa-stack-1x text-white"></i>
                 
                    </span>
                    <a class="clear" href="#">
                      <span id='unverified' class="h3 block m-t-xs"><strong id="firers"><?php echo $unverified; ?></strong></span>
                      <small class="text-muted text-uc">Wainting</small>
                    </a>
                  </div>
                  <div class="col-sm-4 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa fa-exclamation-circle fa-stack-1x text-white"></i>
                 
                    </span>
                    <a class="clear" href="#">
                      <span id='rejected' class="h3 block m-t-xs"><strong id="firers"><?php echo $rejected; ?></strong></span>
                      <small class="text-muted text-uc">Rejected</small>
                    </a>
                  </div>
                </div>
</section>
                <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-4 col-md-4 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-primary"></i>
                      <i class="fa  fa-flag  fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span id='available' class="h3 block m-t-xs"><strong><?php echo $available?></strong></span>
                      <small class="text-muted text-uc">Available</small>
                    </a>
                  </div>
                  <div class="col-sm-4 col-md-4 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa  fa-ban fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span id='sold' class="h3 block m-t-xs"><strong><?php echo $sold?></strong></span>
                      <small class="text-muted text-uc">Sold</small>
                    </a>
                  </div>
                   
                   <div class="col-sm-4 col-md-4 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa  fa-times  fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span id='removed' class="h3 block m-t-xs"><strong><?php echo $removed?></strong></span>
                      <small class="text-muted text-uc">Removed</small>
                    </a>
                  </div>
                </div>
      </section>
      <section class="panel panel-default">
        <header class="panel-heading">
          Requeested Posts
          <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
        </header>
        <div  style="padding: 10px"  class="table-responsive">

          <div class="form-group">
            
          </div>

	<table id="item-list" style='text-align: center;' class="display table table-striped m-b-none"  >
		<thead>
			<tr>
				<th width="10%" style="text-align:center;">UserName</th>
				<th width="10%" style="text-align:center;">Title</th>
				
				<th width="10%" style="text-align:center;">Posted at</th>
				<th width="10%" style="text-align:center;">ProductCat.</th>
				<th width="10%" style="text-align:center;">Promoted</th>
				<th width="10%" style="text-align:center;">Active</th>
				<th width="10%" style="text-align:center;">Status</th>
        <th width="10%" style="text-align:center;">Sponsor</th>
				<th width="10%" style="text-align:center;">Action</th>
			</tr>
		</thead>
		<tbody>


		</tbody>
	</table>
</div>
    </section>
  </section>
</section>

<div id="myModal1" class="modal">
  <span onClick="span2_click()" class="closeimg">&times;</span>
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <div class="container aside-xxl">
      <section class="panel panel-default bg-white m-t-lg">
        <header class="panel-heading text-center">
          <strong>Sponsor the Request</strong>
        </header>
       <input type="hidden" id="idRequest" value="" />
       <div class="panel-body wrapper-lg">
          <div class="form-group">
             
             <div class="form-group">
              <label class="col-sm-2 control-label">Sponsor Days</label>
              <div class="col-sm-10">
                <input type="number" id="SponsorDays" name="SponsorDays" value=""  placeholder="Sponsor Days" class="form-control" autocomplete="nope" required ><br>
              </div><br><br>
            </div>

          <button type="button" onClick="reply_click()" name='sponsor' id='av' class="btn btn-primary btn-block">Sponsoer</button>
          

        </div>
      </section>
    </div>
  </section>
</div>

 </section>
<script type="text/javascript">
$(window).bind("load", function() {
  
//alert(this.name);
  //$('#ccontainer').load('http://localhost/wanttobuy/users');
  
   $('#item-list').DataTable({
        "processing":true,  
        "serverSide":true, 
        "order": [],

        "ajax": {
            url : "<?php echo site_url('reqget')?>",
            type : 'POST'
        },
       "columnDefs": [
        { 
            "targets": [ 5,6,7,8], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    });
   return false;
  });
function reply_click()
{
  var $name =event.srcElement.name;
  var $reqId =event.srcElement.id;

if($name=='delete'){
	
    $.ajax({
        type: 'post',
        url: '<?php echo site_url('reqdel')?>',
        dataType: 'json',
        data: {id: $reqId},
        success: function(callback)
        {
        },
        error: function(status)
        {

        	  $('#item-list').DataTable().ajax.reload();
           setTimeout(function() { restat()}, 100);
        }
    });
}
if($name=='verify'){
    $postId=document.getElementById('idPosting').value;
    $msg=document.getElementById('verifMessage').value;
    $.ajax({
        type: 'post',
        url: '<?php echo site_url('reqaction')?>',
        dataType: 'html',
        data: {id: $postId,
          verify: '1',
          msg:$msg},
        success: function(data)
        {
       $('#item-list').DataTable().ajax.reload();
       document.getElementById("content1").style.display="block";
      document.getElementById("content").style.display="none";
       setTimeout(function() { restat()}, 100);
        },
        error: function(data)
        {
          alert($msg);
      // $('#item-list').DataTable().ajax.reload();
        }
    });
}
if($name=='reject'){
    $postId=document.getElementById('idPosting').value;
    $msg=document.getElementById('verifMessage').value;
    $.ajax({
        type: 'post',
        url: '<?php echo site_url('reqaction')?>',
        dataType: 'html',
        data: {id: $postId,
          verify: '-1',
          msg:$msg},
        success: function(data)
        {
       $('#item-list').DataTable().ajax.reload();
       document.getElementById("content1").style.display="block";
      document.getElementById("content").style.display="none";
       setTimeout(function() { restat()}, 100);
        },
        error: function(data)
        {
          alert(data);
      // $('#item-list').DataTable().ajax.reload();
        }
    });
}

if($name=='return'){

      $('#item-list').DataTable().ajax.reload();
      document.getElementById("content1").style.display="block";
      document.getElementById("content").style.display="none";
}
if($name=='detail'){

 $.post("reqdetails", {id: $reqId}, function(result){
  //alert(document.getElementById("Name").value);
    $verification=result['verification'];
    $complete=result['complete'];
    $sponsor=parseInt(result['sponsorTime']);
    $verifyDate=result['verifDate'];

    if($verification==1){$verification='Verified';}
    if($verification==0){$verification='Unverified';}
    if($verification==-1){$verification='Rejected';}
    if($verification==''){$verification='Unverified';}
    if($verifyDate==null){$verifyDate='Not yet';}

      if($sponsor>=1){$sponsor='Sponsored for '+$sponsor+' Days from the sponsored date';}
      if($sponsor==0){$sponsor='Not sopnsored';}

          if($complete==0){$complete='Available';}
          if($complete==-1){$complete='Removed';}
          if($complete==1){$complete='Sold';}
          
      document.getElementById("content1").style.display="none";
      document.getElementById("content").style.display="block";

      document.getElementById("name").setAttribute('value',result['name']);
      document.getElementById("views").setAttribute('value',result['views']);
      document.getElementById("sponsor").setAttribute('value',$sponsor);
      document.getElementById("sponsorDate").setAttribute('value',result['sponsorDate']);
      document.getElementById("title").setAttribute('value',result['title']);
      document.getElementById("description").innerHTML = result['description'];
      document.getElementById("Budget").setAttribute('value',result['minimumBudget']+' - '+result['maximumBudget']);
      document.getElementById("Category").setAttribute('value',result['productCategory']);
      document.getElementById("rCategory").setAttribute('value',result['requestCategory']);
      document.getElementById("location").setAttribute('value',result['location']);
      document.getElementById("rDate").setAttribute('value',result['postingDate']);
      document.getElementById("pDate").setAttribute('value',result['promotedAt']);
      document.getElementById("status").setAttribute('value',$verification);
      document.getElementById("vdate").setAttribute('value',$verifyDate);
      document.getElementById("complete").setAttribute('value',$complete);
      document.getElementById("verifMessage").innerHTML = result['verifMessage'];
      document.getElementById("idPosting").setAttribute('value',result['idPosting']);

  });
}
if($name=='show'){
  document.getElementById("myModal1").style.display="block";
  document.getElementById("idRequest").setAttribute('value',$reqId);
}

if($name=='sponsor'){
  $reqId=document.getElementById('idRequest').value;
  $spon=document.getElementById('SponsorDays').value;
  //alert($spon);

  $.post("sponsorIt", {id: $reqId,sponsor: $spon}, function(result){

    document.getElementById("myModal1").style.display="none";
location.reload();
    });
}

}
  
function restat(){
  $.get('requests/restatic', function(stat){
         // items.allusers;
          document.getElementById("allreqs").innerHTML = stat.allreqs;
          document.getElementById("available").innerHTML = stat.available;
          document.getElementById("sold").innerHTML = stat.sold;
          document.getElementById("removed").innerHTML = stat.removed;
          document.getElementById("verified").innerHTML = stat.verified;
          document.getElementById("unverified").innerHTML = stat.unverified;
          document.getElementById("rejected").innerHTML = stat.rejected;

        
          });
}
function span2_click()
{
  document.getElementById("myModal1").style.display="none";
}
 
  
</script>

