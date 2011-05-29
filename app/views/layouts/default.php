<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo $pageTitle ?></title>
	<?php
	
	if (isset($requiredCss)) {
		foreach ($requiredCss as $css => $use) {
			echo '<link rel="stylesheet" href="' . WWW_CSS_PATH . $css . '" type="text/css" media="all" charset="utf-8" />' . "\n";
		}
	}
	
	if (isset($requiredJs)) {
		foreach ($requiredJs as $js => $use) {
			echo '<script type="text/javascript" language="javascript" charset="utf-8" src="' . WWW_JS_PATH . $js . '"></script>' . "\n";
		}
	}
	
	?>
</head>
<body>
	
	<header>
		Congratulations! LightVC is working :)
	</header>

	<div id="content">
		<?php echo $layoutContent ?>
	</div>

	<footer>
		Have fun!
	</footer>
	
</body>
</html>
