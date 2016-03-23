<?php include 'functions.php';?>
<?php
if(isset($_POST['mybutton3']))
{
    addUser();
}
?>
<?php include 'header.php';?>
<div class="page-header pool">
        <h1>Uus</h1>
</div>
<a href="index.php" class="btn btn-info">View List</a>

<form class="form-horizontal pool" role="form" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label class="control-label col-sm-2" for="name">Nimi:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" placeholder="Martin">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">Kasutaja:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username" placeholder="Rand">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" placeholder="hotgeero@hotmail.com">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="usertel">Tel:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="usertel" placeholder="53975474">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="gender">Sugu:</label>
    <div class="col-sm-10">
		<input type="radio" name="gender" id="Mees" value="Mees" checked="checked"> Mees<br>
		<input type="radio" name="gender" id="Naine" value="Naine"> Naine
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="userimg">Pilt:</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control" name="userimg" placeholder="Mina.jpg">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="mybutton3" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>



<?php include 'footer.php'; ?>