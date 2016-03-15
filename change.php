<?php include 'functions.php';?>
<?php
if(isset($_POST['mybutton2']))
{
    update();
}else{
	$getone = getone();
}
?>
<?php include 'header.php';?>
<div class="page-header pool">
        <h1>Muuda</h1>
</div>
<a href="index.php" class="btn btn-info">View List</a>

<form class="form-horizontal pool" role="form" method="post" enctype="multipart/form-data">
<input type="hidden" name="hidden" value="<?php echo $getone["id"]; ?>">
<div class="form-group">
    <label class="control-label col-sm-2" for="enimi">Eesnimi:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="enimi" value="<?php echo $getone["eesnimi"]; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pnimi">Perenimi:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="pnimi" value="<?php echo $getone["perenimi"]; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" value="<?php echo $getone["email"]; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pilt">Image:</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control" name="pilt" value="<?php echo $getone["pilt"]; ?>">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
		<input type="hidden" name="mybutton2" value="<?php echo $getone["id"]; ?>">
		<button type="submit" class="btn btn-default" onclick="update()">Salvesta</button>
    </div>
  </div>
</form>

<?php include 'footer.php'; ?>