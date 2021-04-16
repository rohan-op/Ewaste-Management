<?php include('header_user.php');?>
<br>
<body>
    <div class="container">
    <ol class="breadcrumb" style="width: 440px;">
        <li class="breadcrumb-item"><a href="#">User/Organisation</a></li>
        <li class="breadcrumb-item"><a href="#">Profile</a></li>
        <li class="breadcrumb-item"><a href="#">Your Donations</a></li>
        <li class="breadcrumb-item active">Details</li>
    </ol>
    <br>
    <h2 class="text-primary" style="padding-bottom: 10px;">E-waste Donated:</h2>
        <section class="text-gray-600 body-font overflow-hidden">
          <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
              <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-66 object-cover object-center rounded" src="<?= $donation[0]->e_img ?>">
              <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="text-sm title-font text-gray-500 tracking-widest"><?= $donation[0]->e_type ?></h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"><?= $donation[0]->e_name ?></h1>
                <p class="leading-relaxed"><b>Specifications:</b> <?= $donation[0]->e_specs ?></p>
                <p class="leading-relaxed"><b>Quantity:</b> <?= $donation[0]->e_quantity ?></p>          
                <p class="leading-relaxed"><b>Used for(in months):</b> <?= $donation[0]->e_age ?></p>
                <p class="leading-relaxed"><b>Issued On:</b> <?= $donation[0]->date ?></p>
              </div>
                <?php if($donation[0]->service_feedback!='') { ?>
                    <p class="leading-relaxed"><b>Service Feedback:</b> <?= $donation[0]->service_feedback ?>&nbsp;</p>
                    <p class="leading-relaxed"><b>Service CreditPoints:</b> <?= $donation[0]->s_creditpoints ?>&nbsp;</p>
                    <?php if($donation[0]->recycler_feedback!='') { ?>
                        <p class="leading-relaxed"><b>Recycler Feedback:</b> <?= $donation[0]->recycler_feedback ?>&nbsp;</p>
                        <p class="leading-relaxed"><b>Recycler CreditPoints:</b> <?= $donation[0]->r_creditpoints ?>&nbsp;</p>
                    <?php }else{}?>
                <?php }else{}?> 
            </div>
          </div>
        </section>
    </div>

<?php include('footer.php');?>