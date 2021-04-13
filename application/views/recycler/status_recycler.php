<?php include('header_recycler.php');?>
<br>
<body>
<div class="container">
    <ol class="breadcrumb" style="width: 250px;">
        <li class="breadcrumb-item"><a href="#">Recycler</a></li>
        <li class="breadcrumb-item active">Set Status</li>
    </ol>
    <br>
    <h2 class="text-primary">Set Status</h2>
    <br>
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
    <br>
    <div class="row">
        <?php
             if(!empty($status))
             {
                foreach($status as $row)
                {
        ?>
       
        <div class="col-6" style="margin-bottom: 50px;">
                <div class="row">
                    <div class="mycol4">
                        <p>ID:<strong><?php echo $row->e_id ;?></strong></p>
                        <p>Device Type:<strong> <?php echo $row->e_type ;?></strong></p>
                        <p>Date:<strong> <?php echo $row->date ;?></strong></p>
                        <p>Quantity:<strong><?php echo $row->e_quantity ;?></strong></p>
                    </div>
                    <div class="col-4" style="margin-right: 10px;">
                        <img src="<?= $row->e_img ?>" alt="testing image" height="135px" width="135px">
                    </div>
                </div>
                    <div>
                       <?php $option=0 ?>
                    <div>
                        <?= anchor("recycler/productDetails/{$row->e_id}/{$option}",'More Details',['class'=>'btn btn-info']);?>

                          <?= anchor("recycler/updateStatus/{$row->e_id}",'Update Status',['class'=>'btn btn-warning']);?>
                    </div>
                        <br>
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
        <!--this is in div row -->
            <div>
                 <?= $this->pagination->create_links(); ?>
            </div>
</div>
</body>
<?php include('footer.php');
