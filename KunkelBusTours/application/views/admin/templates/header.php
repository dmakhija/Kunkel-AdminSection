<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KBT-Admin-<?php echo $title;?></title>
    
    <!-- ---------------CSS files----------------- -->

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets/admin/bower_components/metisMenu/dist/metisMenu.min.css'); ?>" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo base_url('assets/admin/dist/css/timeline.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/admin/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">    
    <link href="<?php echo base_url('assets/admin/dist/css/kunkel-admin.css'); ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('assets/admin/bower_components/morrisjs/morris.css'); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/admin/bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
	
	<!-- ---------------Javascript files----------------- -->
	
  	<!-- jQuery -->
    <script src="<?php echo base_url('assets/admin/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/admin/bower_components/metisMenu/dist/metisMenu.min.js'); ?>"></script>

    <!-- Morris Charts JavaScript -->
     <script src="<?php echo base_url('assets/admin/bower_components/raphael/raphael-min.js'); ?>"></script>
      <script src="<?php //echo base_url('assets/admin/bower_components/morrisjs/morris.min.js'); ?>"></script>
       <script src="<?php //echo base_url('assets/admin/js/morris-data.js'); ?>"></script>

    <!-- Custom Admin Theme JavaScript -->
     <script src="<?php echo base_url('assets/admin/dist/js/sb-admin-2.js'); ?>"></script>
     <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <!-- Custom KIDD JavaScript -->
      <script src="<?php echo base_url('assets/js/kunkel.js'); ?>"></script>
      <script src="<?php echo base_url('assets/admin/js/destinations.js'); ?>"></script>  
      <script src="<?php echo base_url('assets/admin/js/admin_kunkel.js'); ?>"></script>
      
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
          

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>        
    <![endif]-->
    
    <!-- TinyMCE -->
<script type="text/javascript" src="<?php echo base_url('tiny_mce/tiny_mce.js')?> "></script>
<script type="text/javascript">
	tinyMCE.init({	
		
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,cut,copy,paste,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,|,bullist,numlist,",
		theme_advanced_buttons2 : "outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,|insertdate,inserttime,preview,|,forecolor,backcolorhr,|,sub,sup,|,charmap,|,print,|,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		//content_css : "css/content.css",
		 content_css : "<?php //echo base_url('assets/admin/dist/css/kunkel-admin.css'); ?>",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	
	});
</script>
<!-- /TinyMCE -->
    
    
 
</head>

<body>

<div id="wrapper">
