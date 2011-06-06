<?php

class AppView extends Lvc_View
{
	public function requireCss($cssFile)
	{
		$this->controller->requireCss($cssFile);
	}
}

function e($str) {
	echo htmlspecialchars($str, ENT_NOQUOTES, "UTF-8");
}

?>