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
text-align: center;
}
</style>
</head>
<body>
<div class="container">
<h1><?php echo $title ?></h1>
<p><a href="<?php echo base_url() ?>laporan/exportdonasi" class="btn btn-primary btn-sm mb-3">  Export ke Excel</a></p>
<table>
<thead>
<tr>
<th>No.</th>
<th width="5%">Tanggal Donasi</th>
<th>Nama Donatur</th>
<th>No Rekening </th>
<th>Nominal</th>
<th>Email</th>
<th>Telp</th>
<th>Status</th>
</tr>
</thead>
<tbody>

<?php $no = 1;
foreach($donasi as $donasi) { ?>
<td><?php echo $no++?></td>

<td><?php echo date('d-m-Y',strtotime($donasi->tgl_donasi))?></td>
<td><?php echo $donasi->nama_donatur?></td>
<td><?php echo $donasi->no_rekening?></td>
<td><?php echo $donasi->jml_donasi ?></td>
<td><?php echo $donasi->email_donatur?></td>
<td><?php echo $donasi->telp_donatur ?></td>
<td><?php echo $donasi->status?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</body>
</html>