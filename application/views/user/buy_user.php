<?php include('header_user.php');?>
<br>
<body>
    <div class="container">
    <ol class="breadcrumb" style="width: 250px;">
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item active">Buying</li>
    </ol>
    <br>
    <h2 class="text-primary">Refurbished Product</h2>
    <br>
    <label for="exampleInputEmail1">Sort By</label>  
    <?= form_open('user/search',['class'=>'form-inline my-2 my-lg-0']) ?> 
    <table>
      <tr>
        <td>    
          <?php $options = array(1=>'Price:Lowest to Highest',2=>'Price:Highest to Lowest');?>
          <?php echo form_dropdown('sortby',$options,'Sort By',['class'=>'custom-select']); ?>
        </td>
      </tr>
      <tr></tr>
      <tr>
        <td>
          <?php echo form_input(['name'=>'search','type'=>'text','class'=>'form-control mr-sm-2','placeholder'=>'Search','value'=>set_value('search')]); ?>      
          <?php echo form_submit(['name'=>'submit','class'=>'btn btn-outline-secondary','style'=>'color:black;','value'=>'Submit']); ?>      
        </td>
      </tr>
    </table>
    <?= form_close(); ?>
    <br>
        <div class="row">
        <?php if( count($products) ):
        $count=$this->uri->segment(3);
        foreach ($products as $products): ?>

        <div class="col-6" style="margin-bottom: 40px;">    
            <div class="card border-primary mb-3" style="max-width: 25rem;border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;">        
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
</div>    
</body>
<?php include('footer.php');?>