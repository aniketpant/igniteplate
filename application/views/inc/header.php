<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <title><?php echo $page_title; ?> &mdash; igniteplate</title>
        
        <link rel="icon" type="favicon" href="<?php echo base_url(); ?>public/images/favicon.ico"/>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/inuit.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet" />
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Crimson+Text:700,400' rel='stylesheet' type='text/css'>
        
        <script src="<?php echo base_url(); ?>public/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/js/prefixfree.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js" type="text/javascript"></script>
        
</head>

<body>
    
    <div class="container">
        
        <header id="header" class="row" role="banner">
            <h1 id="logo">igniteplate</h1>
        </header>

        <div class="row">
            
            <nav id="navbar" class="span3" role="navigation">
                <?php include 'navigation.php'; ?>
            </nav>

            <article id="content" class="span6" role="content">
        