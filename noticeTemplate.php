<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width" />
        <meta name="content-language" content="en" />
        <meta name="copyright" content="&copy; <?php echo $date ?>" />
        <meta name="keywords" content="<?php echo $keywords ?>" />
        <meta name="description" content="<?php echo $description ?>" />
        <meta name="author" content="<?php echo $author ?>" />
        <meta name="rating" content="safe for kids" />
        <meta name="robots" content="index, nofollow" />
        <meta name="theme-color" content="#000000" />
        <meta name="msapplication-navbutton-color" content="#000000" />
        <meta name="apple-mobile-web-app-status-bar-style" content="#000000" />
        <meta property="og:image" content="" />
        <meta property="og:url" content="" />
        <meta property="og:title" content="<?php echo $author ?>" />
        <meta property="og:site_name" content="<?php echo $author ?>" />
        <meta property="og:description" content="<?php echo $description ?>" />
        <link href="css/mandatory.css" rel="stylesheet" type="text/css" media="screen" />
        <title><?php echo (isset($title) ? $title : ""); ?></title>
    </head><!-- head ends -->
    <?php flush(); ?>
    <body class="text-center">
        <?php echo (isset($content) ? $content : ""); ?>
        <link href="css/other.css" rel="stylesheet" type="text/css" media="screen" />
    </body><!-- body ends -->
</html><!-- html ends -->