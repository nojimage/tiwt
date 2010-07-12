<?php
/**
 * Tiwt
 *
 * PHP version 5.2
 *
 * Copyright 2010, nojimage (http://php-tips.com/)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    nojimage <nojimage at gmail.com>
 * @copyright 2010 nojimage (http://php-tips.com/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link      http://php-tips.com/
 * @package    app
 * @subpackage app.views.tiwts
 */
$this->set('title_for_layout', '');
echo $this->Form->create(array('action' => 'add'));
echo $this->TwitterForm->tweet('Tiwt.text', array('label' => false, 'counterText' => '数字文り残', 'submit' => 'トッイツ'));
echo $this->Form->end();
?>
<?php echo $this->element('adsense'); ?>
<div id="tweets"><?php if (!empty($timelines)) : foreach ($timelines as $tweet) : ?>
<div class="tweet">
<div class="left"><span class="username"><?php echo '@' . h($tweet['rev']['user']['screen_name']); ?></span><span class="status"><?php echo h($tweet['rev']['text']); ?></span></div>
<div class="right"><span class="icon"><?php echo $this->Html->image($tweet['user']['profile_image_url'], array('alt' => $tweet['rev']['user']['screen_name'])) ?></span></div>
<span class="originalTweet"><?php echo $this->Html->link('トッイツの元 <<',
sprintf('http://twitter.com/%s/status/%s', $tweet['user']['screen_name'], $tweet['id'])); ?></span></div>
<?php endforeach; else: ?>
<p class="error">タイムラインの取得に失敗しました</p>
<?php endif; ?><?php
$this->Js->buffer("
    $('.tweet').corner('round 10px');
");
?></div>
