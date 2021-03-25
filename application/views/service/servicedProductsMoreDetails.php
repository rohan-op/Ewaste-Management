<?php include('header_service.php');?>
<br>
<body>
	<div class="container">
	    <ol class="breadcrumb" style="width: 250px;">
	        <li class="breadcrumb-item"><a href="#">Service</a></li>
	        <li class="breadcrumb-item active">Serviced Product Detail</li>
	    </ol>
	    <br>
	    <table>
	    	<tr>
	    		<td>
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
			    <td>
			    	<div class="col-5" style="margin-left: 20px;">
			    	<h2><?= $details->e_name ?></h2>
			    	<p><strong>Type: </strong><?= $details->e_type ?></p>
			    	<p><span class="mr-1"><strong>Usage(In Months):</strong><?= $details->e_age ?></strong></span></p>
			    	<br>
			    	<p class="pt-1"><strong>Specifications: </strong> <?= $details->e_specs ?></p>
        			<br>
        			<p><strong>Quantity: </strong><?= $details->e_quantity ?></strong></p>
        			
	    			</div>
			    </td>
	    	</tr>
	    	<tr>
	    		
	    	</tr>
	    </table>
	</div>    
</body>
<?php include('footer.php');?>