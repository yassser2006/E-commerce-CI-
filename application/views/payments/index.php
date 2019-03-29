
<section id="content">
  <section class="vbox">
    <section class="scrollable padder">
      <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo site_url()?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Payments</li>
      </ul>
      <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-4 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-bell-o  fa-stack-1x text-white" aria-hidden="true"></i>
                    </span>
                    <a class="clear" href="#">
                      <span id='allpayments' class="h3 block m-t-xs"><strong><?php echo $allpayments?></strong></span>
                      <small class="text-muted text-uc">Payments</small>
                    </a>
                  </div>
                  <div class="col-sm-4 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-primary"></i>
                      <i class="fa fa-check-circle  fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span id='verified' class="h3 block m-t-xs"><strong id="bugs"><?php echo $verified?></strong></span>
                      <small class="text-muted text-uc">Verified</small>
                    </a>
                  </div>
                   <div class="col-sm-4 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-clock-o  fa-stack-1x text-white"></i>
                      <span class="easypiechart pos-abt" data-percent="0" data-line-width="4" data-track-Color="#fff" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="3000" data-target="#bugs" data-update=""></span>
                    </span>
                    <a class="clear" href="#">
                      <span id='unverified' class="h3 block m-t-xs"><strong id="bugs"><?php echo $unverified?></strong></span>
                      <small class="text-muted text-uc">Waiting</small>
                    </a>
                  </div>

                  <div class="col-sm-4 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa fa-exclamation-circle  fa-stack-1x text-white"></i>
                      <span class="easypiechart pos-abt" data-percent="0" data-line-width="4" data-track-Color="#fff" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="3000" data-target="#bugs" data-update=""></span>
                    </span>
                    <a class="clear" href="#">
                      <span id='rejected' class="h3 block m-t-xs"><strong id="bugs"><?php echo $rejected; ?></strong></span>
                      <small class="text-muted text-uc">Rejected</small>
                    </a>
                  </div>
                  
                </div>
      </section>
      <section class="panel panel-default">
        <header class="panel-heading">
          Payments Data
          <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
        </header>
        <div style="padding: 10px"  class="table-responsive">

          <div class="form-group">
            
          </div>

	


	<table id="item-list" class="table table-bordered table-striped table-hover"  style="width:100%;text-align:center;">
		<thead>
			<tr>
				<th width="10%" style="text-align:center;">Photo</th>
				<th width="20%" style="text-align:center;">UserName</th>
				<th width="10%" style="text-align:center;">Level</th>
				<th width="20%" style="text-align:center;">PaymentDate</th>
				<th width="10%" style="text-align:center;">Status</th>
				<th width="20%" style="text-align:center;">VerificationDate</th>
        <th width="20%" style="text-align:center;">verifMessage</th>
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

 </section>

<div id="myModal1" class="modal">
  <span onClick="span2_click()" class="closeimg">&times;</span>
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <div class="container aside-xxl">
      <span class="navbar-brand block" >Verfication</span>
      <section class="panel panel-default bg-white m-t-lg">
        <header class="panel-heading text-center">
          <strong>Verfication Message</strong>
        </header>
       <input type="hidden" id="idPayment" value="" />
       <div class="panel-body wrapper-lg">
          <div class="form-group">
              <div >
                <textarea id="verifMessage" name="verifMessage" class="form-control" rows="6" data-minwords="6" placeholder="Verfication Message"  autocomplete="nope" >   </textarea><br>
              </div>
            </div>

          <button type="button" onClick="reply_click()" name='verify' id='av' class="btn btn-primary btn-block">Verify</button>
          <button type="button" onClick="reply_click()" name='reject' id='ar' class="btn btn-danger btn-block ">Reject</button>
          

        </div>
      </section>
    </div>
  </section>
</div>
<script type="text/javascript">


$(window).bind("load", function() {
  
//alert(this.name);
  //$('#ccontainer').load('http://localhost/wanttobuy/users');
  
   $('#item-list').DataTable({
        "processing":true,  
        "serverSide":true, 
        "order": [],

        "ajax": {
            url : "<?php echo site_url('payget')?>",
            type : 'POST'
        },
       "columnDefs": [
        { 
            "targets": [ 0,6,7 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    });
   return false;
  });

function reply_click()
{
  var $name =event.srcElement.name;
  var $payId =event.srcElement.id;

if($name=='delete'){
    $.ajax({
        type: 'post',
        url: '<?php echo site_url('paydel')?>',
        dataType: 'json',
        data: {id: $payId},
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

if($name=='show'){
//alert($payId);

document.getElementById("myModal1").style.display="block";

$.post("payshow", {id: $payId}, function(result){
  
      
    document.getElementById("myModal1").style.display="block";
    document.getElementById("idPayment").setAttribute('value',result['idPayment']);
    document.getElementById("verifMessage").innerHTML = result['verifMessage'];
  });
}

if($name=='verify'){
  $idPayment=document.getElementById('idPayment').value;
  $msg=document.getElementById('verifMessage').value;
  $.post("payverify", {id: $idPayment,
                    verify: '1',
                    msg:$msg}, 
    function(result){
    
      document.getElementById("myModal1").style.display="none";
      $('#item-list').DataTable().ajax.reload();
      
    });
 setTimeout(function() { restat()}, 100);
}

if($name=='reject'){

  $idPayment=document.getElementById('idPayment').value;
  $msg=document.getElementById('verifMessage').value;

  $.post("payverify", {id: $idPayment,
                  verify: '-1',
                  msg:$msg}, 
  function(result){
  
      
    document.getElementById("myModal1").style.display="none";
      $('#item-list').DataTable().ajax.reload();
      
  });
  setTimeout(function() { restat()}, 100);
  
  
}


}

function restat(){

  $.get('payments/restatic', function(stat){
         // items.allusers;
          document.getElementById("allpayments").innerHTML = stat.allpayments;
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

