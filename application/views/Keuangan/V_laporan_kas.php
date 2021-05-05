<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $title ?></title>
<style type="text/css" media="screen">
body {
background-color: #EEE;
font-family: Arial ;
}
.container {
width: 80%;
padding: 20px;
background-color: #fff;
min-height: 300px;
margin: 40px auto;
border-radius: 10px;
}
table {
border: solid thin #000;
border-collapse: collapse;
width: 100%;
}
tr {
border-collapse: collapse;
}
td,th {
padding: 6px 12px;
border-bottom: solid thin #EEE;
text-align: left;
}
</style>
</head>
<body>
<div class="container">
<h1><?php echo $title ?></h1>
<p><a href="<?php echo base_url() ?>laporan/export" class="btn btn-primary btn-sm mb-3">  Export ke Excel</a></p>
<table>
<thead>
<tr>
<th>No.</th>
<th width="5%">Judul</th>
<th>Tanggal Laporan </th>
<th>No Rekening </th>
<th>Nominal</th>
<th>Status</th>
<th>Deskripsi</th>
</tr>
</thead>
<tbody>

<?php $no=1;
foreach($kas as $kas) { ?>
<tr>
<td><?php echo $no++?></td>
<td><?php echo $kas->judul ?></td>
<td><?php echo date('d-m-Y',strtotime($kas->tanggal_laporan)) ?></td>
<td><?php echo $kas->no_rekening ?></td>
<?php
$nominal=  $kas->nominal ?>

<td>Rp.<?= number_format($nominal, 2 ); ?></td>
<td><?php echo $kas->status ?></td>
<td><?php echo $kas->deskripsi?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</body>
</html>