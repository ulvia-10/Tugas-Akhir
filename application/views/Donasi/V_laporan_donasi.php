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
<br><br>
<body>
<div class="container">
<h1><?php echo $title ?></h1>
<p><a href="<?php echo base_url() ?>laporan/exportdonasi" class="btn btn-primary btn-sm mb-3">  Export ke Excel</a></p>

<!-- bulan -->
        <div class="form-group">
						<div class="row" id="element-wilayah">
							<div class="mb-2 row">
								<label class="col-sm-3 col-form-label">Bulan</label>
								<div class="col-sm-9">
									<select name="bulan" class="form-select digits" id=""
										required="Bulan harap diisi" >
										<option  disabled="disabled" value="bulan">-- Pilih salah satu --</option>

										<?php
                                        foreach ($pilih as $bulan) {

                                            echo '<option value="' . $bulan['bulan'] . '">' . $bulan['bulan'] . '</option>';
                                        }
                                        ?>
									</select>
								</div>
							</div>
						</div>
				
        </div>
        <br>
        <!-- tahun -->
        <div class="form-group">

        <div class="row" id="element-wilayah">
            <div class="mb-2 row">
                <label class="col-sm-3 col-form-label">Tahun</label>
                <div class="col-sm-4">
                    <select name="tahun" class="form-select digits" id=""
                        required="wilayah harap Diisi">
                        <option value="tahun">-- Pilih salah satu --</option>

                        <?php
                        foreach ($pilih->result_array() as $bulan) {

                            echo '<option value="' . $bulan['tahun'] . '">' . $bulan['tahun'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        </div>

</div>
</body>
</html>