<!DOCTYPE html> 
<html>
<head>
  <style type="text/css">
  .mycol4{
            margin-right: 10px; 
            padding-left: 20px; 
            padding-bottom: 10px; 
            padding-top: 10px;
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
          }
  </style>
  <title></title>
  <?= link_tag('assets/css/bootstrap.min.css'); ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#"><img height=110 width=110 src=<?= base_url('/assets/images/logo.png')?> ></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01" style="margin-left: 10px;">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/dashboard')?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/profile')?>">Requests</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/maintenancelist')?>">Sell Refurbished Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/maintenancelist')?>">Report Status</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('login/logout')?>">Logout</a>
      </li>
    </ul>
    <?= form_open('user/search',['class'=>'form-inline my-2 my-lg-0']) ?>     
      <?php echo form_input(['name'=>'search','type'=>'text','class'=>'form-control mr-sm-2','style'=>'margin-bottom:7px;','placeholder'=>'Search','value'=>set_value('search')]); ?>      
      <?php echo form_submit(['name'=>'submit','class'=>'btn btn-outline-secondary','style'=>'color:white;','value'=>'Search']); ?>      
    <?= form_close(); ?>
    <?php echo form_error('search',"<p class='navbar-text text-danger'",'</p>');?>
    
  </div>
 </nav>