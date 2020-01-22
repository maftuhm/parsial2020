<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="<?php echo $lang;?>">
	<head>
        <meta charset="<?php echo $charset; ?>">
		<title><?php echo $title;?></title>
		<meta name="keywords" content="<?php $keywords;?>"/>
		<?php if ($mobile === FALSE): ?>
        <!--[if IE 8]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
		<?php else: ?>
        <meta name="HandheldFriendly" content="true">
		<?php endif; ?>		
		
		<?php if ($mobile == TRUE && $mobile_ie == TRUE): ?>
        <meta http-equiv="cleartype" content="on">
		<?php endif; ?>
        
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="google" content="notranslate">
        <meta name="robots" content="noindex, nofollow">
		
		<?php if ($mobile == TRUE && $ios == TRUE): ?>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="<?php echo $title; ?>">
		<?php endif; ?>
		
		<?php if ($mobile == TRUE && $android == TRUE): ?>
        <meta name="mobile-web-app-capable" content="yes">
		<?php endif;?>
		<link rel="icon" href="<?php echo base_url($templates_dir . '/images/logoparsial2020-icon.png'); ?>">
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url($plugins_dir . '/sweetalert2/sweetalert2.min.css'); ?>">        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url($templates_dir . '/css/form-style.css?v=1.2'); ?>">

	</head>

	<body>
		<div class="container">
