<?php include('header_user.php');?>

<style>
form{
  margin-left: 25%;
}
</style>
<br>
<body>
    <div class="container">
    <ol class="breadcrumb" style="width: 250px;">
        <li class="breadcrumb-item"><a href="#">User/Organisation</a></li>
        <li class="breadcrumb-item active">Donate E-waste</li>
    </ol>
    <br>
    <h2 class="text-primary" style="padding-bottom: 10px; margin-left:25%;">Donate Your E-waste Here</h2>
    <form>
  <fieldset>
   <div class="container"> 
    
    <div class="form-group">
      <div class="row">
      <div class="col-3">
      <label for="Select Product">Select Your Product</label>
      </div>
      <div class="col-3">
      <select id="Productselect"  style=" width: 200px ,height:200px ,padding: 16px; font-size: 15px">
        <option>Laptop</option>
        <option>Microcontroller</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
      </div>
      </div>
    </div>
    <div class="form-group">
        <div class="row">
        <div class="col-3">
        <label class="col-form-label" for="ModelName">Company/Model Name</label>
        </div>
        <div class="col-3">
        <input type="text"  placeholder="Name" id="Companyname">
        </div>
        </div>
    </div>
    <div class="form-group">
      <div class="row">
      <div class="col-3">
      <label for="Reason">Reason For Discarding/Selling</label>
      </div>
      <div class="col-3">
      <select id="reason" style=" width: 200px ,height:200px ,padding: 16px; font-size: 15px" >
        <option>Worn out parts</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
      </div>
    </div>
    </div>
    <div class="form-group">
      <div class="row">
      <div class="col-3">
      <label for="Details">Details/Specifications</label>
      </div>
      <div class="col-3">
      <textarea id="exampleTextarea" rows="4" placeholder="Type your message"></textarea>
      </div>
    </div>
    </div>
    <div class="form-group">
      <div class="row">
      <div class="col-3">
      <label for="howold">How Old the product is?</label>
      </div>
      <div class="col-3">
      <select id="years" style=" width: 200px ,height:200px ,padding: 16px; font-size: 15px">
        <option>10 years</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    </div>
    </div>
    <div class="form-group">
      <label for="Picture">Picture of the product</label>
      <input type="file" class="form-control-file" id="productpicture" aria-describedby="fileHelp">
      <small id="fileHelp" class="form-text text-muted">The Picture should be in jpg,jpeg,PNG Format.</small>
    </div>
    
    </fieldset>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
  </div>
</form>
</div>
</body>
<?php include('footer.php');?>