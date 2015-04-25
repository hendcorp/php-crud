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

$sql = mysql_query("SELECT id, nama, email, hp FROM t_member ORDER BY ID DESC");
?>
</head>
<body>
<div class="container">
<?php include "module/nav.php"; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Rekap Data (Read, Update, Delete)</h1>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th width="5%"><center>NO</center></th>
					<th>NAMA</th>
					<th>EMAIL</th>
					<th>HP</th>
					<th width="15%"><center>ACTION</center></th>
				</tr>
			</thead>
			<tbody>
			<?php $no=1; while ($row = mysql_fetch_array($sql)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['hp']; ?></td>
					<td align="center">
					<a href="edit.php?id=<?php echo $row['id']; ?>">update</a> 
					| 
					<a href="del.php?id=<?php echo $row['id']; ?>" onclick ="if (!confirm('Apakah Anda yakin akan menghapus data ini?')) return false;">delete</a>
					</td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
		</table>
	</div>
</div>	

</div>
<?php include "module/footer.php"; ?>
</body>
</html>