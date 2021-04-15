<?php include('header_service.php');?>
<br>
<body>
	<div class="container">
	    <ol class="breadcrumb" style="width: 400px;">
	        <li class="breadcrumb-item"><a href="#">Service</a></li>
	         <li class="breadcrumb-item"><a href="#">Serviced Product</a></li>
	        <li class="breadcrumb-item active">Product Detail</li>
	    </ol>
	    <section class="text-gray-600 body-font overflow-hidden">
          <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
              <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-66 object-cover object-center rounded" src="<?= $details->p_img1 ?>">
              <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="text-sm title-font text-gray-500 tracking-widest"><?= $details->p_type ?></h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"><?= $details->p_name ?></h1>                
                <p class="leading-relaxed"><b>Specifications:</b> <?= $details->p_specs; ?></p>
                <p class="leading-relaxed"><b>Amount:</b> <?= $details->amount ?></p>                      
                <p class="leading-relaxed"><b>Quantity:</b> <?= $details->quantity; ?></p>                                   
              </div>
            </div>
          </div>
        </section>
	</div>    
<?php include('footer.php');?>