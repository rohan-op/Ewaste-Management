<?php include('header_recycler.php');?>
<br>
<body>
	<div class="container">
	    <ol class="breadcrumb" style="width: 35%;">
	        <li class="breadcrumb-item"><a href="#">Recycler</a></li>
	        <?php

        			   if($option==1)
        			   {
        	?>
	        <li class="breadcrumb-item"><a href="#">Requests</a></li>
	         <?php } else{    ?>
	         	<li class="breadcrumb-item"><a href="#">Product Status</a></li>
             <?php } ?>
	        <li class="breadcrumb-item active">Product Detail</li>
	    </ol>
	    <br>
	    <table>
	    	<tr>
	    		<td width="20%">
	    		<div class="col-24" style="margin-bottom: 40px;">    
            		<div class="card border-primary mb-3" style="max-width: 25rem;border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;"> 
			    		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
			                <div class="carousel-inner">
			                  <div class="carousel-item active">
			                    <img class="d-block w-100" src="<?= $details->e_img ?>" alt="First slide">
			                  </div>
			                  <div class="carousel-item">
			                    <img class="d-block w-100" src="<?= $details->e_img ?>" alt="Second slide">
			                  </div>
			                  <div class="carousel-item">
			                    <img class="d-block w-100" src="<?= $details->e_img ?>" alt="Third slide">
			                  </div>
			                </div>
			            </div>
			        </div>
			    </div>
			    </td>
			    <td width="50%">
			    	<div class="col-5" style="margin-left: 100px;">
			    	<h2><?= $details->e_name ?></h2>
			    	<p><strong>Type: </strong><?= $details->e_type ?></p>
			    	<p><span class="mr-1"><strong>Usage(In Months):</strong><?= $details->e_age ?></strong></span></p>
			    	<br>
			    	<p class="pt-1"><strong>Specifications: </strong> <?= $details->e_specs ?></p>
        			<br>
        			<p><strong>Quantity: </strong><?= $details->e_quantity ?></strong></p>
        			<p><strong>Feedback from Service Center: </strong><?= $details->service_feedback ?></strong></p>
        			<br>
        			<?php

        			   if($option==1)
        			   {
        			?>
        			<form method="post">
                    <button  name="accept" formaction="<?= base_url('recycler/accept') ?>" type="submit" class="btn btn-primary"  value="<?= $details->e_id ?>">Accept</button>
                   
                    </form>
        	

        		 <?php } else{    ?>

        			     <!--  <form method="post">
                        
                        <button  name="forward" formaction="<?= base_url('service/forwardRequest') ?>" type="submit" class="btn btn-primary"  value="<?= $details->e_id ?>">Forward</button>        
                    </form> -->
                    <br>
                    <?= anchor("recycler/updateStatus/{$details->e_id}",'Update Status',['class'=>'btn btn-warning']);?>
                <?php }  ?> 
	    			</div>
			    </td>
	    	</tr>
	    	<tr>
	    		
	    	</tr>
	    </table>
	</div>    
</body>
<?php include('footer.php');?>