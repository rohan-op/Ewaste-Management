<?php include('header_user.php');?>
<br>
<body>
	<div class="container">
	    <ol class="breadcrumb" style="width: 250px;">
	        <li class="breadcrumb-item"><a href="#">User</a></li>
	        <li class="breadcrumb-item active">Product Detail</li>
	    </ol>
	    <section class="text-gray-600 body-font overflow-hidden">
          <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
              <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-66 object-cover object-center rounded" src="<?= $details->p_img1 ?>">
              <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="text-sm title-font text-gray-500 tracking-widest"><?= $details->p_type ?></h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"><?= $details->p_name ?></h1>
                <div class="flex mb-4">
                  <span class="flex items-center">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-green-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-green-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-green-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-green-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-green-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <span class="text-gray-600 ml-3">4 Reviews</span>
                  </span>
                </div>
                <p class="leading-relaxed"><b>Specifications:</b> <?= $details->p_specs; ?></p>
                <p class="leading-relaxed"><b>Seller:</b> <?= $details->cname ?></p>          
                <p class="leading-relaxed"><b>Price:</b> ₹<?= $details->p_cost ?></p>
                <?= anchor("user/addtoCart/{$details->p_id}",'Add to Cart',['class'=>'btn btn-success']);?>  
              </div>
            </div>
          </div>
        </section>


        <section class="text-gray-600 body-font overflow-hidden">

		  <div class="container px-5 py-24 mx-auto">
		  	<h2 class="text-primary">Reviews</h2><br>
		    <div class="-my-8 divide-y-2 divide-gray-100">
		      <div class="py-8 flex flex-wrap md:flex-nowrap">
		        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
		          <span class="font-semibold title-font text-gray-700">CATEGORY</span>
		          <span class="mt-1 text-gray-500 text-sm">12 Jun 2019</span>
		        </div>
		        <div class="md:flex-grow">
		          <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">Bitters hashtag waistcoat fashion axe chia unicorn</h2>
		          <p class="leading-relaxed">Glossier echo park pug, church-key sartorial biodiesel vexillologist pop-up snackwave ramps cornhole. Marfa 3 wolf moon party messenger bag selfies, poke vaporware kombucha lumbersexual pork belly polaroid hoodie portland craft beer.</p>
		          <a class="text-indigo-500 inline-flex items-center mt-4">Learn More
		            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
		              <path d="M5 12h14"></path>
		              <path d="M12 5l7 7-7 7"></path>
		            </svg>
		          </a>
		        </div>
		      </div>
		      <div class="py-8 flex flex-wrap md:flex-nowrap">
		        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
		          <span class="font-semibold title-font text-gray-700">CATEGORY</span>
		          <span class="mt-1 text-gray-500 text-sm">12 Jun 2019</span>
		        </div>
		        <div class="md:flex-grow">
		          <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">Meditation bushwick direct trade taxidermy shaman</h2>
		          <p class="leading-relaxed">Glossier echo park pug, church-key sartorial biodiesel vexillologist pop-up snackwave ramps cornhole. Marfa 3 wolf moon party messenger bag selfies, poke vaporware kombucha lumbersexual pork belly polaroid hoodie portland craft beer.</p>
		          <a class="text-indigo-500 inline-flex items-center mt-4">Learn More
		            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
		              <path d="M5 12h14"></path>
		              <path d="M12 5l7 7-7 7"></path>
		            </svg>
		          </a>
		        </div>
		      </div>
		      <div class="py-8 flex flex-wrap md:flex-nowrap">
		        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
		          <span class="font-semibold title-font text-gray-700">CATEGORY</span>
		          <span class="text-sm text-gray-500">12 Jun 2019</span>
		        </div>
		        <div class="md:flex-grow">
		          <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">Woke master cleanse drinking vinegar salvia</h2>
		          <p class="leading-relaxed">Glossier echo park pug, church-key sartorial biodiesel vexillologist pop-up snackwave ramps cornhole. Marfa 3 wolf moon party messenger bag selfies, poke vaporware kombucha lumbersexual pork belly polaroid hoodie portland craft beer.</p>
		          <a class="text-indigo-500 inline-flex items-center mt-4">Learn More
		            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
		              <path d="M5 12h14"></path>
		              <path d="M12 5l7 7-7 7"></path>
		            </svg>
		          </a>
		        </div>
		      </div>
		    </div>
		  </div>
		</section>

	</div>    
</body>
<?php include('footer.php');?>