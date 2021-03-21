<?php include('header_user.php');?>
<br>
<body>
    <div class="container">
    <ol class="breadcrumb" style="width: 330px;">
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item"><a href="#">Profile</a></li>
        <li class="breadcrumb-item"><a href="#">Your Orders</a></li>
        <li class="breadcrumb-item active">Details</li>
    </ol>    
    <br>
    <h2 class="text-primary">Order Details</h2>
    <br>
        <div class="row">
        <?php if( count($order) ):
        $count=$this->uri->segment(3);
        foreach ($order as $order): ?>

        <div class="col-6" style="margin-bottom: 40px;">    
            <div class="card border-primary mb-3" style="max-width: 25rem;border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;">        
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="<?= $order->p_img1 ?>" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?= $order->p_img1 ?>" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?= $order->p_img1 ?>" alt="Third slide">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h4 class="card-title"><?= $order->p_name; ?></h4>
                <p class="card-text">Type:<strong><?= $order->p_type; ?></strong></p>
                <p class="card-text">Quantity:<strong><?= $order->quantity; ?></strong></p>
                <p class="card-text">Sub Total:<strong><?= $order->amount; ?></strong></p>
                <div>
                  <table>
                    <tr>
                      <td>
                        <?= anchor("user/productDetails/{$order->p_id}",'More Details',['class'=>'btn btn-info']);?>
                      </td>                  
                    </tr>
                  </table>
                </div> 
              </div>
            </div>
          </div>

            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                  <td colspan="3">No records found.</td>
                </tr>
            <?php endif; ?>   
        </div>
  </div>
</div>    
</body>
<?php include('footer.php');?>