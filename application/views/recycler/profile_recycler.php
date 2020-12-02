<?php include('header_recycler.php');?>
<br>
<body>
	<div class="container">
    <ol class="breadcrumb" style="width: 250px;">
        <li class="breadcrumb-item"><a href="#">Recycler</a></li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>
    <br>
    <h2 class="text-primary" style="padding-bottom: 10px">Details</h2>
    	<table style="font-size: 20px;border-spacing: 0 30px; border-collapse: separate; width: 60%">
    		<tr>
		      <th>Role:&nbsp;</th>
		      <td>User</td>
		      <td rowspan="5"><img src="<?= $recycler->profile_img ?>" alt="Profile image" height="158px" width="158px" style="border-radius: 50%;"> </td>
    		</tr>
    		<tr>
              <th>Name:&nbsp;</th>
              <td><?= $recycler->fname ?></td>
              <td> </td>
            </tr>
            <tr>
              <th>Company:&nbsp;</th>
              <td><?= $recycler->cname ?></td>
              <td> </td>
            </tr >
            <tr>
              <th>Contact:&nbsp;</th>
              <td><?= $recycler->contact ?></td>
              <td> </td>
            </tr>
            <tr>
              <th>Email:&nbsp;</th>
              <td><?= $recycler->email ?></td>
              <td> </td>
            </tr>
            <tr>
              <th>Address:&nbsp;</th>
              <td><?= $recycler->address ?></td>
              <td> </td>
            </tr>
    	</table>
	</div>
</body>
<br>
<?php include('footer.php');?>