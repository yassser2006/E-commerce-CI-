
<section id="content">
  <section class="vbox">
    <section class="scrollable padder">
      <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo site_url()?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Advertisements</li>
      </ul><section class="panel panel-default">
        <header class="panel-heading">
          Adverts
          <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
        </header>
        <div class="btn-group" style="padding: 10px">
                <div class="btn-group hidden-nav-xs">
                  <button onClick="reply_click()" id="1" name="create" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                    Add New Advert
                  </button>
                  
                </div>
        </div>

<div style="padding: 10px" class="table-responsive">

   



	<table id="item-list" class="table table-bordered table-striped table-hover"  style="width:100%;text-align:center;">
		<thead>
			<tr>
				<th width="15%" style="text-align:center;">Photo</th>
        <th width="10%" style="text-align:center;">Title</th>
				<th width="25%" style="text-align:center;">Description</th>
				<th width="20%" style="text-align:center;">Url</th>
				<th width="20%" style="text-align:center;">CreatedAt</th>
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
            url : "<?php echo site_url('adsget')?>",
            type : 'POST'
        },
       "columnDefs": [
        { 
            "targets": [ 0,5], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    });
   return false;
  });
function reply_click()
{
  var $name =event.srcElement.name;
  var $adsId =event.srcElement.id;

if($name=='delete'){
    $.ajax({
        type: 'post',
        url: '<?php echo site_url('adsdel')?>',
        dataType: 'json',
        data: {id: $adsId},
        success: function(callback)
        {
        },
        error: function(status)
        {
        	  $('#item-list').DataTable().ajax.reload();
        }
    });
}
if($name=='edit'){


    $.ajax({
        type: 'post',
        url: '<?php echo site_url('adsedit')?>',
        dataType: 'html',
        data: {id: $adsId},
        success: function(data)
        {
			 $('#content').html(data);
       //alert(data);
        },
        error: function(data)
        {
        	alert(data);
 			// $('#item-list').DataTable().ajax.reload();
        }
    });
}
if($name=='create'){


    $.ajax({
        type: 'post',
        url: '<?php echo site_url('adscreate')?>',
        dataType: 'html',
        data: {id: $adsId},
        success: function(data)
        {
       $('#content').html(data);
       //alert(data);
        },
        error: function(data)
        {
          alert(data);
      // $('#item-list').DataTable().ajax.reload();
        }
    });
}
}
  

 
  
</script>

