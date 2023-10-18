<?php
$this->db->from('setting');
$this->db->where('setting_id', 1);
$setting = $this->db->get()->row();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?= base_url()?>uploads/setting/<?= $setting->setting_favicon?>" type="image/png"/>
    <!--plugins-->
    <link href="<?= base_url()?>assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
    <link href="<?= base_url()?>assets/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?= base_url()?>assets/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?= base_url()?>assets/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
    <link href="<?= base_url()?>assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="<?= base_url()?>assets/admin/css/pace.min.css" rel="stylesheet"/>
    <script src="<?= base_url()?>assets/admin/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/admin/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="<?= base_url()?>assets/admin/css/app.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/admin/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="<?= base_url()?>assets/admin/css/dark-theme.css"/>
    <link rel="stylesheet" href="<?= base_url()?>assets/admin/css/semi-dark.css"/>
    <link rel="stylesheet" href="<?= base_url()?>assets/admin/css/header-colors.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />


    <link rel="stylesheet" href="<?= base_url()?>assets/toast/css/iziToast.css"/>
    <script src="<?= base_url()?>assets/toast/js/iziToast.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <title> <?php if($title == null){
            echo $setting->setting_title;
        }else{
            echo $title;
        }?>  </title>
</head>

<body>
<!--wrapper-->
<div class="wrapper">
