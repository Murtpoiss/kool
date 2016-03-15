<?php include 'functions.php';?>
<?php
if(isset($_POST['mybutton3']))
{
    addnew();
}
?>
<?php include 'header.php';?>
<div class="page-header pool">
        <h1>Uus</h1>
</div>
<a href="index.php" class="btn btn-info">View List</a>

<form class="form-horizontal pool" role="form" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label class="control-label col-sm-2" for="enimi">Eesnimi:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="enimi" placeholder="Martin">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pnimi">Perenimi:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="pnimi" placeholder="Rand">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" placeholder="hotgeero@hotmail.com">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pilt">Image:</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control" name="pilt" placeholder="Mina.jpg">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="mybutton3" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>



<?php include 'footer.php'; ?>