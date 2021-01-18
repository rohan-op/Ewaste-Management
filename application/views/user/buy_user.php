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
          <?php
         
           if(!empty($buy))
           {
            foreach($buy as $row)
            {
              
         ?>
            
        <div class="col-6" style="margin-bottom: 50px;">
                <div class="row">
                    <div class="mycol4">
                        <p><strong><?php echo $row->e_name; ?></strong>
                        <p>Service By:<strong> Laptop</strong></p>
                        <p>Date:<strong> 3/11/2020</strong></p>
                        <p>Price:<strong>3</strong></p>
                    </div>
                    <div class="col-4" style="margin-right: 10px;">
                        <img src="<?= $row->e_img ?>" alt="laptop image" height="135px" width="135px">
                    </div>
                </div>
                <div>
                  <form action="<?= base_url('user/addToCart/$pageno') ?>" method="post">
                    <div >    <button class="btn btn-info">Details</button> 
                              <input type="submit" name="add_to_cart" class="btn btn-success" value="Add to Cart"/>
                              <input type="hidden" name="hidden_id" value="<?= $row->e_id ?>">
                              <input type="hidden" name="hidden_name" value="<?php echo $row->e_name; ?>" />
                    </div>
                  </form>
        
                </div> 
        </div> 
        <?php
        }
        }
       else{
       echo "No result found";
        }
        ?>
        
    </div>
    <div>
                <ul class="pagination">
                    <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">&laquo;</a>
                    </li>
                    <?php 
                     $i=1;
                     while($i<=$total_pages)
                     {
                        if($i==$pageno)
                        {
                    ?>
                     
                    <li class="page-item active">
                        <a class="page-link" href="<?php echo "?pageno=".($i);?>"><?= $i;?></a>
                    </li>
                    <?php
                  }
                  else
                  {
                    ?>
                     <li class="page-item">
                        <a class="page-link" href="<?php echo "?pageno=".($i);?>"><?= $i;?></a>
                    </li>
                    <?php
                       }
                        $i++;
                       }
                    ?>
                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">&raquo;</a>
                    </li>
                </ul>
            </div>
  </div>
     
</body>
<?php include('footer.php');?>