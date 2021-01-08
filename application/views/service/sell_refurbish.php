<?php include('header_service.php');?>
<br><br>
<div class="container">
    <ol class="breadcrumb" style="width: 300px;">
        <li class="breadcrumb-item"><a href="#">Service/Sell refurbished products</a></li>
        <li class="breadcrumb-item active">Sell product</li>
    </ol>
    <br>
    <?php echo form_open_multipart('Service/sellEwaste'); ?>
    <?= form_hidden('date',date('Y-m-d H:i:s')) ?>
    <fieldset>
      
      <h2 class="text-primary">Enter Details of refurbished product</h2>
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

      <div class="row">
      <div class="col-lg-6">
          <div class="form-group">
            <label for="TypeOfProduct">Product Type</label>      
            <?php $options = array('laptop/pc'=>'Laptop/PC','mobile'=>'Mobile','tv'=>'TV','others'=>'Others');?>
            <?php echo form_dropdown('e_type',$options,'Type',['class'=>'custom-select']); ?>
          </div>
      </div>
      <div class="col-lg-6">
        <?php echo form_error('e_type');?>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
          <div class="form-group">
            <label for="EwasteName">Model Name</label>
            <?php echo form_input(['name'=>'e_name','type'=>'text','class'=>'form-control','placeholder'=>'Enter E-waste Model Name','value'=>set_value('e_name')]); ?>
          </div>
      </div>
      <div class="col-lg-6">
        <?php echo form_error('e_name');?>
      </div>
    </div>

    <div class="row">
    <div class="col-lg-6">
        <div class="form-group">
          <label for="Ewastecost">Cost of the product</label>
          <?php echo form_input(['name'=>'e_age','type'=>'number','class'=>'form-control','placeholder'=>'Enter Age (In months)','value'=>set_value('e_age')]); ?>
        </div>
    </div>
    <div class="col-lg-6">
      <?php echo form_error('e_age');?>
    </div>
  </div>

  

    <div class="row">
    <div class="col-lg-6">
        <div class="form-group">
          <label for="EwasteSpecifications">Specifications/Details</label>
          <?php echo form_textarea(['name'=>'e_specs','type'=>'text','class'=>'form-control','placeholder'=>'Enter Details','value'=>set_value('e_specs')]); ?>
        </div>
    </div>
    <div class="col-lg-6">
      <?php echo form_error('e_specs');?>
    </div>
  </div>

<div class="row">
  <div class="col-lg-6">
      <div class="form-group">
        <label for="exampleInputEmail1">Image of refurbished product</label>
        <br>
        <?php echo form_upload(['name'=>'userfile','class'=>'custom-file']); ?>
      </div>
  </div>
  <div class="col-lg-6">
    <?php if(isset($upload_error)) echo $upload_error ?>
  </div>
</div>
    <br>
    <?php echo form_reset(['name'=>'reset','class'=>'btn btn-primary','value'=>'Reset']); ?>
    <?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Enter']); ?>
  </fieldset>
</div>
<?php include('footer.php');?>