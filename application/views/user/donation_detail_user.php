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
        <div class="row" style="">`
            <div class="col-12" style="margin-bottom : 15%;">
                <div class="row">
                    <div class="mycol4">
                        <p>Name:<strong><?= $donation[0]->e_name ?></strong></p>
                        <p>Device Type:<strong><?= $donation[0]->e_type ?></strong></p>
                        <p>Quantity:<strong><?= $donation[0]->e_quantity ?></strong></p>
                        <p>Used(Years):<strong><?= $donation[0]->e_age ?></strong></p>
                        <p>Details:<strong><?= $donation[0]->e_specs ?></strong></p>
                        <p>Issued on:<strong><?= $donation[0]->date ?></strong></p>
                        
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-4" style="margin-right: 10px;">
                        <img src="http://[::1]/CI_EWM/uploads/user/download.png" alt="laptop image" height="135px" width="135px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include('footer.php');?>