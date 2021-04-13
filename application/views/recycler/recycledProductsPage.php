<?php include('header_recycler.php');?>
<div class="container">
	<br>
	  <ol class="breadcrumb" style="width: 400px;">
	        <li class="breadcrumb-item"><a href="#">Recycler</a></li>
	        <li class="breadcrumb-item"><a href="#">Profile</a></li>
	        <li class="breadcrumb-item active">Recycled Products</li>
	 </ol>
	 <br>
	 <h2 class="text-primary">Recycled Products</h2>
	    <br>
	    <br>
	    <table class="table">
		<thead>
			<tr>
				<th>Sr. No.</th>
				<th>Product Name</th>
				<th>Date</th>
				<th>Details</th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($recycled)): ?>
			<?php $count = $this->uri->segment(3)?>
			<?php foreach($recycled as $recycled): ?>
			<tr>
				<td><?= ++$count ?></td>
				
				<td><?= $recycled->e_name?></td>
			
				<td><?= date('d M y H:i:s',strtotime($recycled->date)) ?></td>
				<td><?= anchor("recycler/recycledProductDetails/{$recycled->e_id}",'View Details',['class'=>'btn btn-info']);?></td>
			</tr>
		<?php endforeach; ?>
		<?php else: ?>
				<tr>
					<td colspan="3">No records found.</td>
				</tr>
			<?php endif;?>
		</tbody>
	</table>
	<?= $this->pagination->create_links();?>
</div>
<?php include('footer.php');?>