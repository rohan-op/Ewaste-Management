<?php include('header_user.php'); ?>


	  <br><br>
	  <br> 
	  <?php if($feedback = $this->session->flashdata('feedback')): ?> 
	  	<?php $class = $this->session->flashdata('class');?>   
		<div class="row">
			<div class="col-lg-6">
				 <div class="alert alert-dismissible alert-<?php echo $class; ?>">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong></strong> <a href="#" class="alert-link">
				  	<?= $feedback ?>
				  </a>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<br>
	<div class="row">
		<div class="col-lg-12">
	<div class="jumbotron">
	 <h1 class="display-3">Hello!</h1>
	  <p class="lead">Welcome to EWM, A web applications which allows you to buy refurbished products from the most entrusted sellers. It also provides you an opportunity to save the planet by recycling your E-waste in an organised and transperent way.</p>
	  <hr class="my-4">
	  </div>
	  </div>
	  <br>
	  <p class="lead">
	</div>
	
	<h2 style="margin-left: 400px">Things You can Buy</h2>
	<a href="buyPage" style="margin-left: 1350px">See More>></a>
	<br>
	
	<div class="row">
		<div class="col-lg-3">
		<div class="card border-light mb-3" style="max-width: 24rem;">
  	<div class="card-header"><b>Your orders</b></div>
  	<div class="card-body">
    	<h4 class="card-title">Recent Orders</h4>
		<?php $count=0; ?>
    	<p class="card-text"><?php foreach($orders as $orders): ?>
			
			
				<p><?= ++$count ?> &nbsp; <?=$orders->p_name ?>&nbsp;&nbsp;<?= $orders->amount ?>&nbsp;<?= date('d M y H:i:s',strtotime($orders->date)) ?></p>
		<?php endforeach; ?></p>
		<a href="yourOrders">See More>></a>
  	</div>
</div>
</div>
	
	<?php foreach ($products as $products): ?>
	
<div class="col-3">    
	<div class="card border-primary mb-3" style="max-width: 17rem;border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;">        
	  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
		  <div class="carousel-item active">
			<img class="d-block w-100" src="<?= $products->p_img1 ?>" alt="First slide">
		  </div>
		  <div class="carousel-item">
			<img class="d-block w-100" src="<?= $products->p_img1 ?>" alt="Second slide">
		  </div>
		  <div class="carousel-item">
			<img class="d-block w-100" src="<?= $products->p_img1 ?>" alt="Third slide">
		  </div>
		</div>
	  </div>
	  <div class="card-body">
		<h4 class="card-title"><?= $products->p_name; ?></h4>
		<p class="card-text">Type:<strong><?= $products->p_type; ?></strong></p>
		<p class="card-text">Date:<strong> 3/11/2020</strong></p>
		<p class="card-text">Price:<strong><?= $products->p_cost; ?></strong></p>
		<div>
		  <table>
			<tr>
			  <td>
				<?= anchor("user/productDetails/{$products->p_id}",'More Details',['class'=>'btn btn-info']);?>
			  </td>
			  <td>
				<?= anchor("user/addtoCart/{$products->p_id}",'Add to Cart',['class'=>'btn btn-success']);?>
			  </td>
			</tr>
		  </table>
		</div> 
	  </div>
	</div>
  </div>

	<?php endforeach; ?>
</div>
	  </p>
	<h2 style="margin-left: 400px">Things You can Donate</h2>
	<br>
	<div class="row">
		<div class="col-lg-3">
		<div class="card border-light mb-3" style="max-height: 15%;">
  	<div class="card-header">Your Donations</div>
  	<div class="card-body" style="max-height: 20%">
    	<h4 class="card-title">Recent Donations</h4>
		<?php $count=0; ?>
    	<p class="card-text"><?php foreach($donations as $donations): ?>
			
				<p><?= ++$count ?> <?= $donations->e_name ?> <?= date('d M y H:i:s',strtotime($donations->date)) ?></p>
		
		<?php endforeach; ?></p>
		<a href="yourDonations">See More>></a>
  	</div>
</div>
</div>

		<div class="col-lg-9">
			  <!--Carousel Wrapper-->
  <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

<!--Controls-->
<div class="controls-top">
  <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
  <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
</div>
<!--/.Controls-->

<!--Indicators-->
<ol class="carousel-indicators">
  <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
  <li data-target="#multi-item-example" data-slide-to="1"></li>
  <li data-target="#multi-item-example" data-slide-to="2"></li>
</ol>
<!--/.Indicators-->

<!--Slides-->
<div class="carousel-inner" role="listbox">

  <!--First slide-->
  <div class="carousel-item active">

	<div class="row">
	  <div class="col-md-4">
		<div class="card mb-2">
		  <img class="card-img-top" src="https://www.englishclub.com/images/speaking/mobile-landline-400.jpg"
			   alt="Card image cap">
		  <div class="card-body">
			<h4 class="card-title">Telecomunication Equipments</h4>
			<p class="card-text">Any product like Mobile phone ,  Telephone , Mobile Charger etc</p>
			
		  </div>
		</div>
	  </div>

	  <div class="col-md-4 clearfix d-none d-md-block">
		<div class="card mb-2">
		  <img class="card-img-top" src="https://specials-images.forbesimg.com/imageserve/5e78ff9cc7b02d000666f76d/960x0.jpg?fit=scale"
			   alt="Card image cap">
		  <div class="card-body">
			<h4 class="card-title">Information Technology</h4>
			<p class="card-text">You can donate Home Computer, Laptop , or any product related to computer i.e. Keyboard, mouse, cpu etc.</p>
			
		  </div>
		</div>
	  </div>

	  <div class="col-md-4 clearfix d-none d-md-block">
		<div class="card mb-2">
		  <img class="card-img-top" src="https://www.butterflyindia.com/dist/img/modern-appliances.png"
			   alt="Card image cap">
		  <div class="card-body">
			<h4 class="card-title">Small Household appliances</h4>
			<p class="card-text">Any small Household item like iron, dryer, trimmer , etc.</p>
			
		  </div>
		</div>
	  </div>
	</div>

  </div>
  <!--/.First slide-->

  <!--Second slide-->
  <div class="carousel-item">

	<div class="row">
	  <div class="col-md-4">
		<div class="card mb-2">
		  <img class="card-img-top" src="https://media.istockphoto.com/photos/home-appliancess-set-of-household-kitchen-technics-in-the-new-or-picture-id952839420?k=6&m=952839420&s=612x612&w=0&h=VgQfQfryejLqCm9Z59lX2vzJuGAyjHIQPAaKtbGJPP8="
			   alt="Card image cap">
		  <div class="card-body">
			<h4 class="card-title">Big Household Appliacnces</h4>
			<p class="card-text">Appliances like Refrigerator, Air Conditioner, Microwave etc</p>
			
		  </div>
		</div>
	  </div>

	  <div class="col-md-4 clearfix d-none d-md-block">
		<div class="card mb-2">
		  <img class="card-img-top" src="https://5.imimg.com/data5/DK/RS/MY-9547291/power-tools-collections-500x500.jpg"
			   alt="Card image cap">
		  <div class="card-body">
			<h4 class="card-title">Electrical and Electronic tools</h4>
			<p class="card-text">Tools like handheld drills, saws, screwdrivers etc</p>
			
		  </div>
		</div>
	  </div>

	  <div class="col-md-4 clearfix d-none d-md-block">
		<div class="card mb-2">
		  <img class="card-img-top" src="https://5.imimg.com/data5/LN/BF/MY-2246628/medical-devices-500x500.jpg"
			   alt="Card image cap">
		  <div class="card-body">
			<h4 class="card-title">Medical equipment systems </h4>
			<p class="card-text">All equipments with the exception of all implanted and infected products</p>
			
		  </div>
		</div>
	  </div>
	</div>

  </div>
  <!--/.Second slide-->


</div>
<!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->
</div>
</div>
<br>
<br>
	<table>
	<tr>
		<td>
		<div class="card border-primary mb-3" style="max-width: 45rem; margin-left:60px">
		  <div class="card-header">Why Buy Refurbished Products</div>
		  <div class="card-body">
		    <p class="card-text">Buying refurbished E-products is a step towards preserving and saving the environment and it also helps you save a lot of money as the second Hand products are cheaper than the new one.This website provides you with that option and trusted sellers. </p>
		  </div>
		</div>
		</td>
		<td>&nbsp;&nbsp;</td>
		<td>
		
		
		<div class="card border-primary mb-3" style="max-width: 35rem;">
		  <div class="card-header">Why Recycle?</div>
		  <div class="card-body">
		    
		    <p class="card-text">Many old electronic devices contain toxic substances that include lead, mercury, cadmium, beryllium, polyvinyl chloride, and chromium. When e-waste is tossed into landfills, these chemicals leach into the soil, polluting the ground water as well as the air.
Electronics are made of components that contain valuable raw materials. Recycling old devices saves energy. It also means that fewer raw materials need to be drawn from nature to create new devices.</p>
		  </div>
		</div>
		</td>
			
	</tr>
	</table>
	

</div> 
<?php include('footer.php'); ?>