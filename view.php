<?php include 'functions.php';?>
<?php
if(isset($_POST['mybutton1']))
{
    delUser();
}else{
	$getone = getUserData();
}
?>
<?php include 'header.php';?>
<div class="page-header pool">
        <h1>Kasutaja</h1>
</div>
<a href="index.php" class="btn btn-info">View List</a>
<div class="row">
	<div class="col-md-6">
        <table class="table table-striped">
            <thead>
				<tr>
					<th>#</th>
					<th>Nimi</th>
					<th>Kasutaja</th>
					<th>E-mail</th>
					<th>Tel</th>
					<th>Sugu</th>
					<th>Pilt</th>
					<th>Valikud</th>
				</tr>
            </thead>
            <tbody>
			<?php
				echo "<tr><td>".$getone["id"]."</td><td>".$getone["name"]."</td><td>".$getone["username"]."</td><td>".$getone["email"]."</td><td>".$getone["userimg"]."</td><td>".$getone["regdate"]."</td><td>";
			?>
				<form action="change.php" method="post">
				<input type="hidden" name="mybutton" value="<?php echo $getone["id"]; ?>">
				<button type='submit' class='btn btn-xs btn-success'>Muuda</button>
				</form>
				<form method="post">
				<input type="hidden" name="mybutton1" value="<?php echo $getone["id"]; ?>">
				<button type='submit' class='btn btn-xs btn-success'>Kustuta</button></td></tr>
				</form>
            </tbody>
        </table>
    </div>
</div>
<?php
if($getone['userimg']){?>
<img src="<?php echo "pilt/".$getone["userimg"]; ?>" class="img-rounded" alt="<?php echo $getone["userimg"]; ?>" width="auto" height="300">
<?php }
?>
<?php include 'footer.php'; ?>