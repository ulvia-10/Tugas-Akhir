<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
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
    <!-- Page Sidebar Ends-->
    <div class="page-body">
                <!-- Zero Configuration  Starts-->
                <!-- Main Content -->
                <?php $this->load->view($namafolder . '/' . $namafileview); ?>
                <!-- End Main Content -->
                <!-- Container-fluid Ends-->
            </div>
       
        </div>
    </div>


    <!--end  Plugin used-->

    <style>
    .removeRow {
        background-color: #FF0000;
        color: #FFFFFF;
    }
    </style>
    <script>
    $(document).ready(function() {

        $('.delete_checkbox').click(function() {
            if ($(this).is(':checked')) {
                $(this).closest('tr').addClass('removeRow');
            } else {
                $(this).closest('tr').removeClass('removeRow');
            }
        });

        $('#delete').click(function() {
            var checkbox = $('.delete_checkbox:checked');
            if (checkbox.length > 0) {
                var checkbox_value = [];
                $(checkbox).each(function() {
                    checkbox_value.push($(this).val());
                });
                $.ajax({
                    url: "<?php echo base_url(); ?>Master/delete",
                    method: "POST",
                    data: {
                        checkbox_value: checkbox_value
                    },
                    success: function() {
                        $('.removeRow').fadeOut(1500);
                    }
                })
            } else {
                alert('Select atleast one records');
            }
        });

    });

		window.setTimeout(function () {
			$(".alert").fadeTo(500, 0).slideUp(500, function () {
				$(this).remove();
			});
		}, 5000);

    </script>
