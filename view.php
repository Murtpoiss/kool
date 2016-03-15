<?php include 'functions.php';?>
<?php
if(isset($_POST['mybutton1']))
{
    del();
}else{
	$getone = getone();
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
					<th>Eesnimi</th>
					<th>Perenimi</th>
					<th>E-mail</th>
					<th>Pilt</th>
					<th>Valikud</th>
				</tr>
            </thead>
            <tbody>
			<?php
				echo "<tr><td>".$getone["id"]."</td><td>".$getone["eesnimi"]."</td><td>".$getone["perenimi"]."</td><td>".$getone["email"]."</td><td>".$getone["pilt"]."</td><td>".$getone["aeg"]."</td><td>";
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
if($getone['pilt']){?>
<img src="<?php echo "pilt/".$getone["pilt"]; ?>" class="img-rounded" alt="<?php echo $getone["pilt"]; ?>" width="auto" height="300">
<?php }
?>
<?php include 'footer.php'; ?>