<?php include 'functions.php';?>
<?php
if(isset($_POST['mybutton2']))
{
    updUser();
}else{
	$getone = getUserData();
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
    <label class="control-label col-sm-2" for="name">Nimi:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="<?php echo $getone["name"]; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">Kasutaja:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username" value="<?php echo $getone["username"]; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" value="<?php echo $getone["email"]; ?>">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="usertel">Tel:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="usertel" value="<?php echo $getone["usertel"]; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="gender">Sugu:</label>
    <div class="col-sm-10">
		<input type="radio" name="gender" id="Mees" value="Mees" checked="<?php if($getone["gender"]="Mees"){echo "checked";}; ?>"> Mees<br>
		<input type="radio" name="gender" id="Naine" value="Naine" checked="<?php if($getone["gender"]="Naine"){echo "checked";}; ?>"> Naine
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="userimg">Image:</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control" name="userimg" value="<?php echo $getone["userimg"]; ?>">
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