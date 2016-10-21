<?php
// We first include a couple of user-defined functions that our template
// files will use
include_once("user-defined.php");
?>
<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title><?php echo $page->data["title"]; ?> - <?php echo $page->data["site"]["name"]; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="/assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="/assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="/assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" href="/assets/css/custom.css" />
		<meta name="author" content="<?php echo $page->data["site"]["author"]; ?>" />
		<link rel="stylesheet" href="/assets/js/styles/default.css" />
		<script src="/assets/js/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="index.html"><?php echo $page->data["site"]["name"]; ?></a></h1>
								<!--<span>by HTML5 UP</span>-->
							</div>

						<!-- Nav -->
						<?php include("navigation-menu.php"); ?>


					</header>
				</div>
<!-- Main -->
<div id="main-wrapper">
	<div class="container">
				<div id="content">

					<!-- Content -->
						<article>
							<?php include("insert-translations.php"); ?>
						</article>

				</div>
			</div>
</div>
<?php include("footer.php"); ?>
<!-- :indentSize=2:tabSize=2: -->
