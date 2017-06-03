<!DOCTYPE HTML>
<head>
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
<title>Well Played Cinema</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/menu/css/simple_menu.css">
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="css/boxes/css/style5.css">
<link rel="stylesheet" type="text/css" media="screen" href="css-bootstrap/bootstrap.min.css">
<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
<!--JS FILES STARTS-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.eislideshow.js"></script>
<script src="js/custom.js"></script>
<script>
jQuery.noConflict()(function ($) {
    $('#ei-slider').eislideshow({
        animation: 'center',
        autoplay: true,
        slideshow_interval: 3000,
        titlesFactor: 0
    });
});
</script>
<script src="js/slides/slides.min.jquery.js"></script>
<script src="js/cycle-slider/cycle.js"></script>
<script src="js/nivo-slider/jquery.nivo.slider.js"></script>
<script src="js/tabify/jquery.tabify.js"></script>
<script src="js/prettyPhoto/jquery.prettyPhoto.js"></script>
<script src="js/twitter/jquery.tweet.js"></script>
<script src="js/scrolltop/scrolltopcontrol.js"></script>
<script src="js/portfolio/filterable.js"></script>
<script src="js/modernizr/modernizr-2.0.3.js"></script>
<script src="js/easing/jquery.easing.1.3.js"></script>
<script src="js/kwicks/jquery.kwicks-1.5.1.pack.js"></script>
<script src="js/swfobject/swfobject.js"></script>
<!-- get fancybox -->
<link rel="stylesheet" type="text/css" itemprop="javascript" href="js/fancybox/jquery.fancybox.css" media="all">
<script src="js/fancybox/jquery.easing.1.3.js"></script>
<script src="js/fancybox/jquery.fancybox-1.2.1.js"></script>
</head>
<?php
session_start();
require_once("connection.php");
?>
<body>
