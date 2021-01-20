<?php include('header_user.php');?>
<br>
<body>
<ul class="nav nav-pills" style="margin-left:25%;">
  
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Brand</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Price</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Review</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </li>
</ul>
<br>
<br>

    <div class="container">
    <ol class="breadcrumb" style="width: 250px;">
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item active">Buying</li>
    </ol>
    <br>
    <h2 class="text-primary">Refurbished Product</h2>
    <br><br>
        <div class="row">
        <?php if( count($products) ):
        $count=$this->uri->segment(3);
        foreach ($products as $products): ?>
        <div class="col-6" style="margin-bottom: 50px;">
                <div class="row">
                    <div class="mycol4">
                        <p><strong><?= $products->p_name; ?></strong>
                        <p>Type:<strong><?= $products->p_type; ?></strong></p>
                        <p>Date:<strong> 3/11/2020</strong></p>
                        <p>Price:<strong><?= $products->p_price; ?></strong></p>
                    </div>
                    <div class="col-4" style="margin-left: 10px;">
                        <img src="<?= $products->photo1 ?>" alt="laptop image" height="120px" width="120px">
                    </div>
                </div>
                <div>
                  <?= anchor("user/productDetails/{$products->p_id}",'Details',['class'=>'btn btn-info']);?>
                  <?= anchor("user/addtoCart/{$products->p_id}",'Add to Cart',['class'=>'btn btn-success']);?>
                </div> 
            </div> 
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                  <td colspan="3">No records found.</td>
                </tr>
            <?php endif; ?>   
        </div>

      <div>
        <?= $this->pagination->create_links(); ?>
      </div>
  </div>
     
</body>
<?php include('footer.php');?>