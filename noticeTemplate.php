<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width" />
        <meta name="content-language" content="en" />
        <meta name="copyright" content="&copy; <?php echo $date ?>" />
        <meta name="keywords" content="system developer, software developer, web designer, webdesigner, webdesign, systemutvecklare, webbutvecklare, webbdesign, mats richard hellstrand, goldenmaza" />
        <meta name="description" content="" />
        <meta name="author" content="goldenmaza" />
        <meta name="rating" content="safe for kids" />
        <meta name="robots" content="index, nofollow" />
        <link href="css/default_template.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/default_section.css" rel="stylesheet" type="text/css" media="screen" />
        <title><?php echo (isset($title) == true ? $title : ""); ?></title>
    </head><!-- head ends -->
    <?php flush(); ?>
    <body class="text-center">
        <?php echo (isset($content) == true ? $content : ""); ?>
    </body><!-- body ends -->
</html><!-- html ends -->