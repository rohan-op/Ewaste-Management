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
        <div class="row">
        <section class="text-gray-600 body-font">
          <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
        <?php if( count($products) ):
        $count=$this->uri->segment(3);
        foreach ($products as $products): ?>

        <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
        <a class="block relative h-53 rounded overflow-hidden">
          <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="<?= $products->p_img1 ?>">
        </a>
        <div class="mt-4">
          <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1"><?= $products->p_type; ?></h3>
          <h2 class="text-gray-900 title-font text-lg font-medium"><?= $products->p_name; ?></h2>
          <p class="mt-1"><?= $products->p_cost; ?></p>
          <?= anchor("user/addtoCart/{$products->p_id}",'Add to Cart',['class'=>'btn btn-success']);?>
          &nbsp;<br><br>
          <?= anchor("user/productDetails/{$products->p_id}",'More Details',['class'=>'btn btn-info']);?>
        </div>
      </div>

            <?php endforeach; ?>
            </div>
          </div>
        </section>
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