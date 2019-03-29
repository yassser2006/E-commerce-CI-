<br><br><br>
<div class="clearfix"></div>
<div class="container">
 <div class="row row-centered" style="text-align:center;">
<div class="ads-display col-md-10 " style="display:inline-block; float:none;">
<h2 style="text-align:center">User Profile</h2>
<div class="container">
        <div class="col-xs-12 col-sm-10 col-md-10" style="text-align:center">
            <div class="well well-sm" style="display:inline-block; float:none;">
                <div class="row" >
                    <div class="col-sm-6 col-md-4" >
                    	<?php //print_r($posts);?>
                    	<?php if (!empty($posts)) :?>
					<?php	foreach ($posts as $post) :?>
                        
                        <?php 
                        $img='./assets/images/users/'.$post->idUser.'.png';
                        if(!file_exists($img)){
                            $img='./assets/images/users/defaul_user.png';
                          //  die($img);
                        }?>
                        <img height="200" width="400" src="<?php  echo($img);?>" alt=""  style="border-radius: 50%;" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                    	<br />
                        <h4><?php echo $post->name; ?></h4>
                        <small><cite title="address"><?php echo $post->address.', '.$post->location; ?><i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i><?php echo $post->email; ?>
                            <br />
                            <i class="	glyphicon glyphicon-time"></i><?php echo $post->createdAt; ?><br />

                        <i class="glyphicon glyphicon-earphone"></i><?php echo $post->phoneNumber; ?>
                    	</p>
                        <!-- Split button -->
                        <div class="btn-group">
                           <a style='margin:  5px;float: right;' class="account" href="<?php echo(base_url());?>changePassword">Change Password</a>
                            <a style='margin:  5px;float: right;' class="account" href="<?php echo(base_url());?>editAccount">Edit Info</a>
                        </div>
                    </div>
                </div>
</div></div><?php endforeach;?>
					<?php endif;?>

					</div>
					<div class="clearfix"></div>
				
			</div>
		</div>
	</div>
