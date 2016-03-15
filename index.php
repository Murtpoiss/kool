<?php include 'functions.php';?>
<?php include 'header.php';?>
<?php
$get = get();
?>
<div class="page-header pool">
        <h1>Tabel</h1>
</div>
<form action="new.php" method="post">
<button type="submit" class="btn btn-default">Lisa</button>
</form>
<div class="row">
	<div class="col-md-6">
        <table class="table table-striped">
            <thead>
				<tr>
					<th>#</th>
					<th>Eesnimi</th>
					<th>Perenimi</th>
					<th>Muudetud</th>
					<th>Valikud</th>
				</tr>
            </thead>
            <tbody><form action="view.php" method="post">
			<?php
				if ($get->num_rows > 0) {
					// output data of each row
					while($row = $get->fetch_assoc()) {
						echo "<tr><td>".$row["id"]."</td><td>".$row["eesnimi"]."</td><td>".$row["perenimi"]."</td><td>".$row["aeg"]."</td><td>
						<button type='submit' name='mybutton' value='".$row["id"]."' class='btn btn-xs btn-success'>Vaata</button></td></tr>";
					}
				} else {
					echo "Tabel tühi!";
				}
				?>
            </form></tbody>
        </table>
    </div>
</div>
<?php include 'footer.php'; ?>