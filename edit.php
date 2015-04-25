<html>
<head>
<!--
Project Name : CRUD with PHP, MySQL and Bootstrap
Author		 : Hendra Setiawan
Website		 : http://www.hendrasetiawan.net
Email	 	 : hendrabpp[at]gmail.com
-->
<?php 
include "module/header.php";
include "module/alerts.php";
include "config/connect.php"; 

$sql = mysql_query("SELECT id, nama, email, hp FROM t_member WHERE id = '".$_GET['id']."'");
$data = mysql_fetch_array($sql);
?>
</head>
<body>

<div class="container">
<?php include "module/nav.php"; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Form Edit (Update)</h1>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-6">
	<form id="form_input" method="POST">	

<?php  
if(isset($_POST['update']))
{
	mysql_query("UPDATE t_member SET nama = '".$_POST['nama']."', email = '".$_POST['email']."', hp = '".$_POST['hp']."' WHERE id = '".$_GET['id']."'");
	writeMsg('update.sukses');

	//Re-Load Data from DB
	$sql = mysql_query("SELECT id, nama, email, hp FROM t_member WHERE id = '".$_GET['id']."'");
	$data = mysql_fetch_array($sql);
}
?>

	<div class="form-group">
  		<label class="control-label" for="nama">Nama (wajib diisi)</label>
  		<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data['nama']; ?>" required>
	</div>

	<div class="form-group">
  		<label class="control-label" for="email">Email (wajib diisi)</label>
  		<input type="email" class="form-control" name="email" id="email" value="<?php echo $data['email']; ?>" required>
	</div>

	<div class="form-group">
  		<label class="control-label" for="hp">No HP</label>
  		<input type="text" class="form-control" name="hp" id="hp" value="<?php echo $data['hp']; ?>">
	</div>

	<div class="form-group">
	<input type="submit" value="Update" name="update" class="btn btn-primary">
	<a href="rekap.php" class="btn btn-danger">Batal</a>
	</div>

	</form>
	</div>
</div>

</div>
<?php include "module/footer.php"; ?>
</body>
</html>