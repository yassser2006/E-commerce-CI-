
<section id="content">

  <section class="vbox">
    <section class="scrollable padder">
      <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo site_url()?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">User's data</li>
      </ul>
      <section id="statistics">
      <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-users  fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span id='allusers' class="h3 block m-t-xs"><strong><?php echo $allusers?></strong></span>
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
                      <span id='active' class="h3 block m-t-xs"><strong id="bugs"><?php echo $active?></strong></span>
                      <small class="text-muted text-uc">Active</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-clock-o fa-stack-1x text-white"></i>
                 
                    </span>
                    <a class="clear" href="#">
                      <span id='notactive' class="h3 block m-t-xs"><strong id="firers"><?php echo $notactive?></strong></span>
                      <small class="text-muted text-uc">Wainting</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa  fa-ban fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span id='banned' class="h3 block m-t-xs"><strong><?php echo $banned?></strong></span>
                      <small class="text-muted text-uc">Banned</small>
                    </a>
                  </div>
                </div>
      </section>
    </section>
      <section class="panel panel-default">
        <header class="panel-heading">
          Users
          <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
        </header>
        <div style="padding: 10px"  class="table-responsive">

          <div class="form-group">
            
          </div>
	<table id="item-list" class="display table table-striped m-b-none"   style="width:100%;text-align:center;">
		<thead>
			<tr>
				<th width="35%" style="text-align:center;">Photo</th>
				<th width="5%" style="text-align:center;">Name</th>
				<th width="10%" style="text-align:center;">E-mail</th>
				<th width="10%" style="text-align:center;">Address</th>
				<th width="5%" style="text-align:center;">location</th>
				<th width="5%" style="text-align:center;">Phone No.</th>
				<th width="10%" style="text-align:center;">CreatedAt</th>
				<th width="10%" style="text-align:center;">Status</th>
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
<script type="text/javascript">
$(window).bind("load", function() {
  
//alert(this.name);
  //$('#ccontainer').load('http://localhost/wanttobuy/users');
  
   $('#item-list').DataTable({
        "processing":true,  
        "serverSide":true, 
        "order": [],

        "ajax": {
            url : "<?php echo site_url('userget')?>",
            type : 'POST'
        },
       "columnDefs": [
        { 
            "targets": [ 0,8 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    });
   return false;
  });
function reply_click()
{
  var $status =event.srcElement.name;
  var $userId =event.srcElement.id;/*
  $.post("http://localhost/wanttobuy/action",
  {
    id: $userId,
    status: $status
  },function(data,status){});*/
  var $button = $(this);

    $.ajax({
        type: 'post',
        url: '<?php echo site_url('action')?>',
        dataType: 'html',
        data: {id: $userId,status:$status},
        success: function(sata)
        {

         
     		
          $('#item-list').DataTable().ajax.reload();
          var items ;
        $.get('users/restatic', function(data){
         // items.allusers;
          document.getElementById("allusers").innerHTML = data.allusers;
          document.getElementById("active").innerHTML = data.active;
          document.getElementById("notactive").innerHTML = data.notactive;
          document.getElementById("banned").innerHTML = data.banned;

          });
        },
        error: function(data)
        {
         
            console.log(data);
        }
    });
}
  

 
  
</script>

