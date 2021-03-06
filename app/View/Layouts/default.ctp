<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$appName = 'SunshinePHP Talks';
?>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			Talkrate: <?php echo $title_for_layout . "\n"; ?>
		</title>
		<?php
		echo $this->Html->meta('viewport', null, array('name' => 'viewport', 'content' => "width=device-width, initial-scale=1.0")) . "\n";
		echo $this->Html->css('bootstrap.min') . "\n";
		echo $this->Html->css('main') . "\n";
		?>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<?php
		echo $this->Html->script('/js/html5.js') . "\n";
		?>
		<![endif]-->
		<?php
		echo $this->fetch('meta') . "\n";
		echo $this->fetch('css') . "\n";
		?>
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<div class="nav-collapse collapse">
						<?php echo $this->Html->link($appName, '/', array('class' => 'brand')); ?>
						<ul class="nav">
							<li><?php echo $this->Html->link('Talks', '/talks'); ?></li>
						</ul>
						<ul class="nav">
							<li><?php echo $this->Html->link('Tutorials', '/tutorials'); ?></li>
						</ul>
						<?php
						if ($isAdmin) {
							?>
                            <ul class="nav pull-left">
                                <li>
									<?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?>
                                </li>
                            </ul>
							<?php
						}

						if (!$isLoggedIn) {
							?>
							<ul class="nav pull-right">
								<li>
									<?php echo $this->Html->link('Log In', array('controller' => 'users', 'action' => 'login', 'admin' => false)); ?>
								</li>
							</ul>
							<?php
						} else {
							?>
							<ul class="nav pull-right">
								<li>
									<?php echo $this->Html->link('Log Out', array('controller' => 'users', 'action' => 'logout', 'admin' => false)); ?>
								</li>
							</ul>
							<p class="navbar-text pull-right">Logged in as: <?php echo h($loggedInUser['email']); ?></p>
							<?php
						}
						?>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		<div class="container">
			<div id="content">

				<?php echo $this->Session->flash('flash', array('params' => array('class' => 'alert alert-info'))); ?>
				<?php echo $this->Session->flash('auth', array('params' => array('class' => 'alert alert-info'))); ?>

				<?php echo $this->fetch('content'); ?>
			</div>
			<div id="footer">
			</div>
		</div>
		<?php

		echo $this->Html->script('/js/jquery.min.js') . "\n";

		echo $this->fetch('script') . "\n";
		echo $this->element('sql_dump') . "\n";
		?>
	</body>
</html>
