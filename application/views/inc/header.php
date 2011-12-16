<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <title><?php echo $page_title; ?></title>
        
        <link rel="icon" type="favicon" href="<?php echo base_url(); ?>public/images/favicon.ico"/>
        
        <!-- link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/inuit.css" rel="stylesheet" / -->
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/bootstrap.min.css" />
        
        <script src="<?php echo base_url(); ?>public/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/js/bootstrap-alerts.js" type="text/javascript"></script>
        
</head>

<body>
    <div id="header-container">
        <div id="header" class="container">
            <nav role="navigation">
                <?php include 'navigation.php'; ?>
            </nav>
        </div>
    </div>
    <div id="content" class="container">