<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="pixelstrap">
	<link rel="icon" href="<?php echo base_url() ?>assets/pusatbackend/images/logo/logo.png" type="image/x-icon">
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/pusatbackend/images/logo/logo.png"
		type="image/x-icon">
	<title><?= $title ?></title>

	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
		rel="stylesheet">
	<!-- latest jquery-->
    <link rel="stylesheet" type="text/css" href="http://admin.pixelstrap.com/cuba/assets/css/vendors/calendar.css">
    <!-- Plugins css Ends-->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/pusatbackend/css/fontawesome.css">
	<!-- ico-font-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/pusatbackend/css/vendors/icofont.css">
	<!-- Themify icon-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/pusatbackend/css/vendors/themify.css">
	<!-- Flag icon-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/pusatbackend/css/vendors/flag-icon.css">
	<!-- Feather icon-->
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url() ?>assets/pusatbackend/css/vendors/feather-icon.css">
	<!-- Plugins css start-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/pusatbackend/css/vendors/scrollbar.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/pusatbackend/css/vendors/animate.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/pusatbackend/css/vendors/chartist.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/pusatbackend/css/vendors/date-picker.css'); ?>">
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url() ?>assets/pusatbackend/css/vendors/date-time-picker.css">
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url() ?>assets/pusatbackend/css/vendors/datatables.css">
	<!-- Animate  -->
	 <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="assets/pusatbackend/css/vendors/animate.css">
	<!-- Plugins css Ends-->
	<!-- Bootstrap css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/pusatbackend/css/vendors/bootstrap.css">
	<!-- App css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/pusatbackend/css/style.css">
	<link id="color" rel="stylesheet" href="<?php echo base_url() ?>assets/pusatbackend/css/color-1.css" media="screen">
	<!-- Responsive css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/pusatbackend/css/responsive.css">

	<script src="<?php echo base_url() ?>assets/pusatbackend/js/jquery-3.5.1.min.js"></script>
</head>

<body onload="startTime()">
	<!-- tap on top starts-->
	<div class="tap-top"><i data-feather="chevrons-up"></i></div>
	<!-- tap on tap ends-->
	<!-- page-wrapper Start-->
	<div class="page-body">
                <!-- Zero Configuration  Starts-->
                <!-- Main Content -->
                <?php $this->load->view($namafolder . '/' . $namafileview); ?>
                <!-- End Main Content -->
                <!-- Container-fluid Ends-->
            </div>
       
        </div>
    </div>

	<!-- latest jquery-->
	<script src="<?php echo base_url() ?>assets/pusatbackend/js/datepicker/date-time-picker/moment.min.js"></script>
	<script
		src="<?php echo base_url() ?>assets/pusatbackend/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js">
	</script>
	<script src="<?php echo base_url() ?>assets/pusatbackend/js/datepicker/date-time-picker/datetimepicker.custom.js">
	</script>
	<!-- Bootstrap js-->
	<script src="<?php echo base_url() ?>assets/pusatbackend/js/bootstrap/bootstrap.bundle.min.js"></script>
	<!-- feather icon js-->
	<script src="<?php echo base_url() ?>assets/pusatbackend/js/icons/feather-icon/feather.min.js"></script>
	<script src="<?php echo base_url() ?>assets/pusatbackend/js/icons/feather-icon/feather-icon.js"></script>
	<!-- scrollbar js-->
	<script src="<?php echo base_url() ?>assets/pusatbackend/js/scrollbar/simplebar.js"></script>
	<script src="<?php echo base_url() ?>assets/pusatbackend/js/scrollbar/custom.js"></script>
	<!-- Sidebar jquery-->
	<script src="<?php echo base_url() ?>assets/pusatbackend/js/config.js"></script>
	<!-- Plugins JS start-->
	<script src="<?php echo base_url() ?>assets/pusatbackend/js/sidebar-menu.js"></script>
	<script src="<?php echo base_url() ?>assets/pusatbackend/js/datatable/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/pusatbackend/js/datatable/datatables/datatable.custom.js"></script>
	<script src="<?php echo base_url() ?>assets/pusatbackend/js/tooltip-init.js"></script>

	<!-- js timeline -->
	<script src="http://admin.pixelstrap.com/cuba/assets/js/timeline/timeline-v-1/main.js"></script>
    <script src="http://admin.pixelstrap.com/cuba/assets/js/modernizr.js"></script>
	
	<script src="<?php echo base_url() ?>assets/pusatbackend/js/sidebar-menu.js"></script>
	<!-- Plugins JS Ends-->
	<!-- Theme js-->
	<script src="<?php echo base_url() ?>assets/pusatbackend/js/script.js"></script>


	<!-- Dashboard JS-->
	
	<script src="<?= base_url('assets/pusatbackend/js/chart/chartist/chartist.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/chart/chartist/chartist-plugin-tooltip.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/chart/knob/knob.min.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/chart/knob/knob-chart.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/chart/apex-chart/apex-chart.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/chart/apex-chart/stock-prices.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/notify/bootstrap-notify.min.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/dashboard/default.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/notify/index.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/datepicker/date-picker/datepicker.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/datepicker/date-picker/datepicker.en.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/datepicker/date-picker/datepicker.custom.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/typeahead/handlebars.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/typeahead/typeahead.bundle.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/typeahead/typeahead.custom.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/typeahead-search/handlebars.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/typeahead-search/typeahead-custom.js'); ?>"></script>
	<script src="<?= base_url('assets/pusatbackend/js/tooltip-init.js'); ?>"></script>
	<!-- calendar -->
	

	<!--end  Plugin used-->

	<style>
		.removeRow {
			background-color: #FF0000;
			color: #FFFFFF;
		}

	</style>
	<script>
		$(document).ready(function () {

			$('.delete_checkbox').click(function () {
				if ($(this).is(':checked')) {
					$(this).closest('tr').addClass('removeRow');
				} else {
					$(this).closest('tr').removeClass('removeRow');
				}
			});

			$('#delete').click(function () {
				var checkbox = $('.delete_checkbox:checked');
				if (checkbox.length > 0) {
					var checkbox_value = [];
					$(checkbox).each(function () {
						checkbox_value.push($(this).val());
					});
					$.ajax({
						url: "<?php echo base_url(); ?>Master/delete",
						method: "POST",
						data: {
							checkbox_value: checkbox_value
						},
						success: function () {
							$('.removeRow').fadeOut(1500);
						}
					})
				} else {
					alert('Select atleast one records');
				}
			});

		});

		<script>
		window.setTimeout(function () {
			$(".alert").fadeTo(500, 0).slideUp(500, function () {
				$(this).remove();
			});
		}, 5000);

	</script>

	</script>


</body>

</html>
