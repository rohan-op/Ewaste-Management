<?php include('header_user.php');?>
<br><br>
<body>
	<div class="container">
    <ol class="breadcrumb" style="width: 250px;">
        <li class="breadcrumb-item"><a href="#">User/Organisation</a></li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>
    <br>
    <h2 class="text-primary" style="padding-bottom: 10px">Details</h2>
    	<table style="font-size: 20px;border-spacing: 0 30px; border-collapse: separate; width: 60%">
    		<tr>
		      <th>Role:&nbsp;</th>
		      <td>User</td>
		      <td rowspan="5"><img src="<?= $user->profile_img ?>" alt="Profile Image" height="158px" width="158px" style="border-radius: 50%;"> </td>
    		</tr>
    		<tr>
		      <th>Name:&nbsp;</th>
		      <td><?= $user->fname ?></td>
		      <td> </td>
    		</tr>
    		<tr>
		      <th>Company:&nbsp;</th>
		      <td><?= $user->cname ?></td>
		      <td> </td>
    		</tr >
    		<tr>
		      <th>Contact:&nbsp;</th>
		      <td><?= $user->contact ?></td>
		      <td> </td>
    		</tr>
    		<tr>
		      <th>Email:&nbsp;</th>
		      <td><?= $user->email ?></td>
		      <td> </td>
    		</tr>
            <tr>
              <th>Address:&nbsp;</th>
              <td><?= $user->address ?></td>
              <td> </td>
            </tr>
    	</table>
        <br>
        <div>
                    <div >    <?= anchor("user/change_password",'Edit Profile',['class'=>'btn btn-warning']);?>   </div>
                    <br>
                    <?= anchor("user/change_password",'Your Orders',['class'=>'btn btn-info']);?>
                    <?= anchor("user/change_password",'Your Donations',['class'=>'btn btn-info']);?>
                </div>
        <br>
	</div>
</body>
<br>
<?php include('footer.php');?>