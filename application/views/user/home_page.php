<?php include('header_user.php'); ?>
<div class="container">
	  <br><br>
	  <br> 
	  <?php if($feedback = $this->session->flashdata('feedback')): ?> 
	  	<?php $class = $this->session->flashdata('class');?>   
		<div class="row">
			<div class="col-lg-6">
				 <div class="alert alert-dismissible alert-<?php echo $class; ?>">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong></strong> <a href="#" class="alert-link">
				  	<?= $feedback ?>
				  </a>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<br>
	<div class="jumbotron">
	  <h1 class="display-3">Hello!</h1>
	  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
	  <hr class="my-4">
	  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
	  <br>
	  <p class="lead">
	  </p>
	</div>
	<br>

	<table>
	<tr>
		<td>
		<div class="card border-primary mb-3" style="max-width: 35rem;">
		  <div class="card-header">Header</div>
		  <div class="card-body">
		    <h4 class="card-title">Dark card title</h4>
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  </div>
		</div>
		</td>
		<td>&nbsp;</td>
		<td>
		<div class="card border-primary mb-3" style="max-width: 35rem;">
		  <div class="card-header">Header</div>
		  <div class="card-body">
		    <h4 class="card-title">Dark card title</h4>
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  </div>
		</div>
		</td>
	</tr>
	</table>

</div> 
<?php include('footer.php'); ?>