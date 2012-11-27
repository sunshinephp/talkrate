<?php
$this->Html->css('/js/jquery.rateit/rateit.css', null, array('inline' => false));
$this->html->script('/js/jquery.rateit/jquery.rateit.js', array('inline' => false));
$this->Html->scriptStart(array('inline' => false));
echo <<<'SCRIPT'
(function($) {
	$(document).ready(function() {
		var $el = $('.rating').eq(1);
		$el.on('rated', function(e, value) {
			alert('rated at: ' + value);
		});
	});
}(window.jQuery));
SCRIPT;
$this->Html->scriptEnd();
