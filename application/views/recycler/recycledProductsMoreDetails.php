<?php include('header_recycler.php');?>
<br>
<body>
	<div class="container">
	    <ol class="breadcrumb" style="width: 300px;">
	        <li class="breadcrumb-item"><a href="#">Recycler</a></li>
	        <li class="breadcrumb-item active">Recycled Product Detail</li>
	    </ol>
	    <br>
	    <table>
	    	<tr>
	    		<td style="width: 300px">
	    		<div class="col-24" style="margin-bottom: 40px;">    
            		<div class="card border-primary mb-3" style="width: 300px;border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;"> 
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
			    <td style="width: 700px">
			    	<div class="col-5" style="margin-left: 150px;">
			    	<h2><?= $details->e_name; ?></h2>
			    	<p><strong>Type: </strong><?= $details->e_type ?></p>
			    	<p><span class="mr-1"><strong>Usage(In Months):</strong><?= $details->e_age ?></strong></span></p>
			    	<br>
			    		<p><span class="mr-1"><strong>Elements Retrieved After Recycling:</strong></strong></span></p>
			    		<ol>
			    			<li><strong>Gold-><?= $details->gold ?>kg</strong></li>
			    			<li><strong>Silver-><?= $details->silver ?>kg</strong></li>
			    			<li><strong>Palladium-><?= $details->palladium ?>kg</strong></li>
			    			<li><strong>Copper-><?= $details->copper ?>kg</strong></li>
			    			<li><strong>Other Metals-><?= $details->other_metals ?>kg</strong></li>
			    			<li><strong>Other Non-Metals-><?= $details->other_non_metals ?>kg</strong></li>
			    		</ol>

        			<br>
        			
        			
	    			</div>
			    </td>
	    	</tr>
	    	<tr>
	    		
	    	</tr>
	    </table>
	</div>    
</body>
<?php include('footer.php');?>