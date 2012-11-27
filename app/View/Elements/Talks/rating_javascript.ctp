<?php
$this->Html->css('/js/jquery.rateit/rateit.css', null, array('inline' => false));
$this->html->script('/js/jquery.rateit/jquery.rateit.js', array('inline' => false));
$this->html->script('/js/ratings.js', array('inline' => false));
$this->Html->scriptStart(array('inline' => false));
echo <<<'SCRIPT'
(function($) {
	$(document).ready(function() {
		window.SunshinePhp = window.SunshinePhp || {};
		window.SunshinePhp.ratings = new window.SunshinePhp.Ratings();
	});
}(window.jQuery));
SCRIPT;
$this->Html->scriptEnd();
