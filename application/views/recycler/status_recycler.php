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
    <br><br>
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
                        <button class="btn btn-info">More Info</button>
                        <button class="btn btn-primary">Forward</button>
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
