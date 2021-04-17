<?php include('header_service.php');?>
<br>
<body>
    <div class="container">
    <ol class="breadcrumb" style="width: 400px;">
        <li class="breadcrumb-item"><a href="#">Service Center</a></li>
         <li class="breadcrumb-item active"><a href="#">Order Status and Details</a></li>     
    </ol><br>
            <?php if($error = $this->session->flashdata('feedback')): ?>    
            <div class="row">
              <div class="col-lg-6">
                 <div class="alert alert-dismissible alert-<?=$this->session->flashdata('class')?>">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <a href="#" class="alert-link">
                    <?= $error ?>
                  </a>
                </div>
              </div>
            </div>
            <?php endif; ?>
            

        
        <section class="text-gray-600 body-font">
          <div class="container px-5 py-30 mx-auto">
            <h2 class="text-primary">Recent Orders</h2><br>
              <div class="flex flex-wrap -m-4">
        <?php if( count($order) ):
        $count=$this->uri->segment(3);
        foreach ($order as $order): ?>

        <?php if($order->Tracking!="Delivered"){ ?>
          
            <div class="lg:w-1/3 md:w-1/2 p-4 w-full">
            <a class="block relative h-53 rounded overflow-hidden">
              <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="<?= $order->p_img1 ?>">
            </a>
              <div class="mt-4">
                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1"><?= $order->p_type; ?></h3>
                <h2 class="text-gray-900 title-font text-lg font-medium"><?= $order->p_name; ?></h2>
                <p class="mt-1">₹<?= $order->p_cost; ?></p>
                 <?= anchor("service/moreInfoSold/{$order->p_id}/1",'Details and Status',['class'=>'btn btn-warning']);?>
              </div>
            </div>

        <?php } endforeach; ?>
            </div>
          </div>
        </section>
            <?php else: ?>
                <tr>
                  <td colspan="3">No records found.</td>
                </tr>
            <?php endif; ?>   
        
       <br>
      <div>
        <?= $this->pagination->create_links(); ?>
      </div>
</div>    
</body>
<?php include('footer.php');?>