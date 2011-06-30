<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title><?php echo $pageTitle ?></title>
  <link href='http://fonts.googleapis.com/css?family=Ubuntu:regular,italic,bold,bolditalic&v1' rel='stylesheet' type='text/css'>
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
  <div id="wrapper">
    <header>
      <a class="title" href="/" title="Gestion des Activités de la Société de Service">GASS</a>
      <?php if($connected) { ?>
<div id="loginInfos">
  <span class="message">Connecté en tant que <?php echo $full_name?></span>
  <a class="logout" href="/logout">Déconnection</a>
</div>
      <?php } ?>
    <nav><?php
    if (isset($nav)):
    foreach ($nav as $link => $n): ?>
      <a href="<?php echo $link?>"><?php e($n)?></a>
    <?php
    endforeach;
    endif; ?></nav>
      </header>

    <div id="content">
      
<?php if (isset($error)): ?>
<div class="error">
<?php e($error) ?>
</div>
<?php endif;?>
      <?php echo $layoutContent ?>
    </div>
  </div>
    <footer>
      par Gaetan Renaudeau et Nicolae Namolovan
      <?php if (DEBUG): ?>
      <div class="debug">
	<?php
	  echo nl2br(AppModel::query_log_get());
	?>
      </div>
      <?php endif; ?>
    </footer>
</body>
</html>
