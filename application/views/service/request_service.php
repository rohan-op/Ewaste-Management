
<?php
   // if (isset($_POST['accept'])) 
   // {

   //  $this->db->update('ewaste',
   //      array('s_id'=>$this->session->userdata('id')),array('e_id'=>$_POST['hiddenAccept'])) ;
   //      header("refresh: 0");        
   // } 
   // if(isset($_POST['reject']))
   // {
   //   $this->db->update('ewaste',array('s_id'=>'01'),array('e_id'=>$_POST['hiddenAccept'])) ;
   //      header("refresh: 0"); 
   // }
// if(isset($_POST["reject"]))
// {
//     if(isset($_SESSION["shopping_cart"]))
//     {
//         $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
//         if(!in_array($_POST["hiddenAccept"], $item_array_id))
//         {
//             $count = count($_SESSION["shopping_cart"]);
//             $item_array = array(
//                 'item_id'           =>  $_POST["hiddenAccept"]
                
//             );
//             $_SESSION["shopping_cart"][$count] = $item_array;
//         }
//         else
//         {
//             echo '<script>alert("Item Already Added")</script>';
//         }
//     }
//     else
//     {
//         $item_array = array(
//             'item_id'   =>  $_POST["hiddenAccept"]
            
//         );
//         $_SESSION["shopping_cart"][0] = $item_array;
//     }
//     foreach($_SESSION["shopping_cart"] as $keys => $values)
//         {
//             if($values["item_id"] == $_POST["hiddenAccept"])
//             {
//                 // $this->db->update('ewaste',array('s_id'=>$this->session->userdata('id')),array('e_id'=>$values["item_id"])) ;       
//                 unset($_SESSION["shopping_cart"][$keys]);
//                 //header("refresh: 0"); 
//             }
//         }
// }
?>
<?php include('header_service.php');?>
<br>
<body>
<div class="container">
    <ol class="breadcrumb" style="width: 250px;">
        <li class="breadcrumb-item"><a href="#">Service Center</a></li>
        <li class="breadcrumb-item active">Requests</li>
    </ol>
    <br>
    <h2 class="text-primary">Pending Requests</h2>
    <br><br>
    <div class="row">

        <?php
         
           if(!empty($request))
           {
            foreach($request as $row)
            {
              
         ?>
        <div class="col-6" style="margin-bottom: 50px;">
                <div class="row">
                    <div class="mycol4">
                        <p>Device Type:<strong> <?php echo $row->e_type; ?> </strong></p>
                        <p>Date:<strong> <?php echo $row->date; ?> </strong></p>
                        <p>Quantity:<strong><?php echo $row->e_quantity; ?></strong></p>
                    </div>
                    <div class="col-4" style="margin-right: 10px;">
                        <img src=<?= $row->e_img ?> alt="" height="135px" width="135px">
                    </div>
                </div>
                <div>
                    <div >    <button class="btn btn-info">More Info</button>   </div>
                    <br>
                    <!--  <form action="<?= base_url('service/accept') ?>" method="post"> -->
                <form action="<?= base_url('service/accept') ?>" method="post">

                    <input type="hidden" id="accept" name="hiddenAccept" value="<?= $row->e_id ?>">

                    <input type="submit" name="accept"  class="btn btn-primary"  value="Accept" />      
                                 
                    <input type="submit" name="reject" class="btn btn-danger" value="Decline">

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
        <!--this is in div row -->
            <div>
                <ul class="pagination">
                    <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">&laquo;</a>
                    </li>
                    <?php 
                     $i=1;
                     while($i<=$total_pages)
                     {

                    ?>
                    
                    <li class="page-item">
                        <a class="page-link" href="<?php echo "?pageno=".($i);?>"><?= $i;?></a>
                    </li>
                    <?php
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
<?php include('footer.php');
