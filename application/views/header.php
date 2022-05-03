<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
    <html lang="es_mx"  ng-app="CRM">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>MERCADOTECNIA</title>

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="1860" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!--link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.png');?>"-->
    
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/bootstrap.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/font-awesome.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/all.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/ionicons.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/AdminLTE.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/skins/_all-skins.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/morris.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/jquery-jvectormap.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/jquery-ui.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/bootstrap-datepicker.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/bootstrap-datetimepicker.min.css")?>">    
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/daterangepicker.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/bootstrap-timepicker.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/bootstrap-multiselect.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/bootstrap3-wysihtml5.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/dataTables.bootstrap.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/pace.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/bootstrap-float-label.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/mycss.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/buttons.dataTables.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/select2.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/bootstrap-clockpicker.css")?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/jquery-clockpicker.css")?>">
    
    <script type="text/javascript" src="<?= base_url("assets/js/jquery.min.js");?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/jquery-ui.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/bootstrap.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/raphael.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/morris.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/jquery.sparkline.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/jquery-jvectormap-1.2.2.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/jquery-jvectormap-world-mill-en.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/jquery.knob.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/min/moment.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/es.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/daterangepicker.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/bootstrap-datepicker.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/bootstrap-datepicker.es.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/bootstrap-timepicker.min.js")?>"></script>      
    <script type="text/javascript" src="<?= base_url("assets/js/bootstrap-multiselect.js")?>"></script>      
    <script type="text/javascript" src="<?= base_url("assets/js/bootstrap3-wysihtml5.all.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/jquery.slimscroll.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/fastclick.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/adminlte.min.js")?>"></script>
    <!--script type="text/javascript" src="<?= base_url("assets/js/dashboard.js")?>"></script-->
    <script type="text/javascript" src="<?= base_url("assets/js/pace.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/demo.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/jquery.inputmask.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/jquery.inputmask.date.extensions.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/jquery.inputmask.extensions.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/jquery.blockUI.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/Chart.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/Blob.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/FileSaver.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/alasql.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/xlsx.core.min.js")?>"></script>

    <script type="text/javascript" src="<?= base_url("assets/js/bootstrap-clockpicker.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/jquery-clockpicker.min.js")?>"></script>



    <!--PACK COMPLETO DE DATATABLES EN WEB SITE TODO JUNTO PARA QUE FUNCIONE CORRECTAMENTE-->
    <script type="text/javascript" src="<?= base_url("assets/js/datatables.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/pdfmake.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/vfs_fonts.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/buttons.print.min.js")?>"></script>
    <!---->


    <script type="text/javascript" src="<?= base_url("assets/js/jquery.validate.js");?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/bootstrap-datetimepicker.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/notify.js");?>"></script>

 
    
 
    <script type="text/javascript" src="<?= base_url("assets/js/angularjs/angular-datatables.buttons.js");?>"></script>

    <script type="text/javascript" src="<?= base_url("assets/js/select2.full.min.js");?>"></script>


    
    <!--MIS SCRIPS PARA LA PAGINA-->
    <script type="text/javascript" src="<?= base_url("assets/js/url.js")?>"></script>

 
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
 
    <link rel="stylesheet" href="<?= base_url('dist/css/select-beauty.css');?>">

 
    <style>
    body {
    max-width: 100%;
    margin: 0 auto;
    font-family: 'Arial';
    background-color: #fff;
}
    .container { margin: 150px auto; max-width: 640px; }
</style>
     
</style>
</head>
