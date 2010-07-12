<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset(); ?>
<title><?php echo trim($title_for_layout . ' tiwT'); ?></title>
<?php
echo $this->Html->meta('icon');

echo $this->Html->css(array('cake.generic', 'tiwt'));

echo $this->Html->script(array('http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js', 'jquery.corner.js'));

$this->Js->buffer("
    $('#content').corner('round 20px');
");
echo $scripts_for_layout;
?>
<?php if (!Configure::read('debug')) : ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2719935-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript">
window.google_analytics_uacct = "UA-2719935-7";
</script>
<?php endif; ?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link('tiwT', '/'); ?></h1>
		</div>
		<div id="content">
            <?php if ($this->Session->read('Auth.TwitterKitUser')) : ?>
            <div id="logout"><?php echo $this->Html->link(strrev('Logout'), '/twitter_kit/users/logout') ?></div>
            <?php endif; ?>

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

            <?php echo $this->element('adsense'); ?>

		</div>
		<div id="footer">
            <div id="copyright">copyright <?php echo date('Y') ?> 
            <?php echo $this->Html->link('php-tips.com', 'http://php-tips.com/'); ?></div>
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
    <?php echo $js->writeBuffer(); ?>
</body>
</html>