<!DOCTYPE HTML>
<html lang="en">
	<head>
		<!--[if lte IE 9]>
			<script>
				window.location.href = "notice.php"
			</script>
		<![endif]-->
		<meta charset="UTF-8" />
		<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width" />
		<meta name="content-language" content="en" />
		<meta name="copyright" content="&copy; <?php echo $date ?>" />
		<meta name="keywords" content="system developer, software developer, web designer, webdesigner, webdesign, systemutvecklare, webbutvecklare, webbdesign, certified java programmer, mats richard hellstrand, goldenmaza" />
		<meta name="description" content="" />
		<meta name="author" content="goldenmaza" />
		<meta name="rating" content="safe for kids" />
		<meta name="robots" content="index, nofollow" />
		<meta property="og:image" content="" />
		<meta property="og:url" content="" />
		<meta property="og:title" content="Mats Richard Hellstrand - Software Developer" />
		<meta property="og:site_name" content="Mats Richard Hellstrand - Software Developer" />
		<meta property="og:description" content="" />
		<link href="css/foundation_attributes.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="css/section_attributes.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="css/row_attributes.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="css/form_attributes.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="css/responsive_columnFont.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="css/responsive_adaptive.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="css/unsupported_attributes.css" rel="stylesheet" type="text/css" media="screen" />
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="icon" type="image/png" href="favicon.png" sizes="33x33">
		<link rel="apple-touch-icon" sizes="33x33" href="favicon.png">
		<title><?php echo (isset($title) == true ? $title : ""); ?></title>
	</head><!-- head ends -->
	<?php flush(); ?>
	<body class="text-center">
		<h1 class="hidden">goldenmaza's personal website</h1>
		<header>
			<nav>
				<h2 class="hidden">Main Navigation</h2>
				<div class="handler text-left">
					<span id="navigationHandler" class="handlerButton" onclick="toggleTarget();" tabindex="1"></span>
				</div>
				<ul id="navigationBar">
					<li class="forceLeft">
						<a class="navHom" href="http://www.hellstrand.org" title="Return to the start of the site!" onclick="toggleTarget();" tabindex="2">
							<span class="text-center forceHidden">Home</span>
						</a>
					</li>
					<li>
						<a class="navAbo" href="?#abo0" title="Go to the About page!" onclick="toggleTarget();" tabindex="3">
							<span class="text-center">About</span>
						</a>
					</li>
					<li>
						<a class="navPor" href="?#por0" title="Go to the Portfolio pages!" onclick="toggleTarget();" tabindex="4">
							<span class="text-center">Portfolio</span>
						</a>
					</li>
					<li>
						<a class="navQua" href="?#qua" title="Go to the Qualifications pages!" onclick="toggleTarget();" tabindex="5">
							<span class="text-center">Qualifications</span>
						</a>
					</li>
					<li class="forceRight">
						<a class="navMap" href="?#map" title="Go to the Sitemap page!" onclick="toggleTarget();" tabindex="7">
							<span class="text-center forceHidden">Sitemap</span>
						</a>
					</li>
					<li>
						<a class="navCon" href="?#con" title="Go to the Contact page!" onclick="toggleTarget();" tabindex="6">
							<span class="text-center">Contact</span>
						</a>
					</li>
				</ul>
			</nav><!-- nav ends -->
		</header><!-- header ends -->
		<section id="masterSection">
			<?php echo (isset($content) == true ? $content : ""); ?>
		</section><!-- sections ends -->
		<footer>
			<div class="statement text-center">
				<strong>
					&copy; <?php echo $date ?> by goldenmaza
					<img src="favicon.png" alt="The goldenmaza's logotype!" title="The goldenmaza's logotype!" />
				</strong>
			</div><!-- statement ends -->
		</footer><!-- footer ends -->
		<script src="js/contact.js"></script>
		<script src="js/foundation.js"></script>
	</body><!-- body ends -->
</html><!-- html ends -->