
<section id="content">
  <section class="vbox">
    <section class="scrollable padder">
      <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo site_url()?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Offers</li>
      </ul>
       <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-4 col-md-6 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-envelope  fa-stack-1x text-white" aria-hidden="true"></i>
                    </span>
                    <a class="clear" href="#">
                      <span id='alloffers' class="h3 block m-t-xs"><strong><?php echo $alloffers?></strong></span>
                      <small class="text-muted text-uc">Offers</small>
                    </a>
                  </div>
                  <div class="col-sm-4 col-md-6 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-exclamation-circle  fa-stack-1x text-white"></i>
                      <span class="easypiechart pos-abt" data-percent="0" data-line-width="4" data-track-Color="#fff" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="3000" data-target="#bugs" data-update=""></span>
                    </span>
                    <a class="clear" href="#">
                      <span id='read' class="h3 block m-t-xs"><strong id="bugs"><?php echo $read?></strong></span>
                      <small class="text-muted text-uc">Unread</small>
                    </a>
                  </div>
                  
                </div>
      </section>
      <section class="panel panel-default">
        <header class="panel-heading">
          Offers details
          <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
        </header>
        <div style="padding: 10px"  class="table-responsive">

          <div class="form-group">
            
          </div>
	<table id="item-list" class="table table-bordered table-striped table-hover"  style="width:100%;text-align:center;">
		<thead>
			<tr>
				<th width="5%" style="text-align:center;">User Name</th>
				<th width="5%" style="text-align:center;">Post Title</th>
				<th width="10%" style="text-align:center;">Offer date</th>
				<th width="10%" style="text-align:center;">Read at</th>
				<th width="5%" style="text-align:center;">Action</th>
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
<script type="text/javascript">
$(window).bind("load", function() {
     $('#item-list').DataTable({
        "processing":true,  
        "serverSide":true, 
        "order": [],
        "ajax": {
            url : "<?php echo site_url('offget')?>",
            type : 'POST'
        },
       "columnDefs": [
        { 
            "targets": [ 4], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    });
   return false;
  });
function reply_click()
{
  var $name  =event.srcElement.name;
  var $adsId =event.srcElement.id;

if($name=='delete'){
    $.ajax({
        type: 'post',
        url: '<?php echo site_url('offdel')?>',
        dataType: 'json',
        data: {id: $adsId},
        success: function(callback)
        {
        },
        error: function(status)
        {
        	  $('#item-list').DataTable().ajax.reload();
            $.get('offers/restatic', function(stat){
         // items.allusers;
          document.getElementById("alloffers").innerHTML = stat.alloffers;
          document.getElementById("read").innerHTML = stat.read;

          });
        }
    });
}


}
</script>

