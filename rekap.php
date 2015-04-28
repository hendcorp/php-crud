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
<script type="text/javascript">
window.apex_search = {};
apex_search.init = function (){
	this.rows = document.getElementById('data').getElementsByTagName('TR');
	this.rows_length = apex_search.rows.length;
	this.rows_text =  [];
	for (var i=0;i<apex_search.rows_length;i++){
        this.rows_text[i] = (apex_search.rows[i].innerText)?apex_search.rows[i].innerText.toUpperCase():apex_search.rows[i].textContent.toUpperCase();
	}
	this.time = false;
}
apex_search.lsearch = function(){
	this.term = document.getElementById('S').value.toUpperCase();
	for(var i=0,row;row = this.rows[i],row_text = this.rows_text[i];i++){
		row.style.display = ((row_text.indexOf(this.term) != -1) || this.term  === '')?'':'none';
	}
	this.time = false;
}
apex_search.search = function(e){
    var keycode;
    if(window.event){keycode = window.event.keyCode;}
    else if (e){keycode = e.which;}
    else {return false;}
    if(keycode == 13) { apex_search.lsearch(); } else { return false; }
}
</script>
</head>

<body onload="apex_search.init();">
<div class="container">
<?php include "module/nav.php"; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Rekap Data (Read, Update, Delete)</h1>
        </div>
    </div>
</div>

<p>
<div class="row">
<div class="col-lg-4">
    <div class="input-group">
	<input type="text" size="30" class="form-control" maxlength="1000" value="" id="S" onkeyup="apex_search.search(event);" />
	<span class="input-group-btn">
	<input type="button" class="btn btn-default" value="Search" onclick="apex_search.lsearch();"/>
	</span>
	</div>
</div>

<div class="col-lg-4">
<a href="export.php" class="btn btn-success"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Export to Excel</a>
</div>
</div>

<br />

<div class="row">
	<div class="col-md-12">
	<p>
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
			<tbody id="data">
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
	</p>	
	</div>
</div>	

</div>
<?php include "module/footer.php"; ?>
</body>
</html>
