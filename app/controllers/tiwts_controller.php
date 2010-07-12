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
 * @subpackage app.controllers
 */
class TiwtsController extends AppController
{

    var $name = 'Tiwts';

    var $components = array('TwitterKit.Twitter');

    var $helpers = array('TwitterKit.TwitterForm');

    /**
     *
     * @var Tiwt
     */
    var $Tiwt;

    function index() {

        if ($this->Session->read('reflash')) {
            // キャッシュをクリア
            $this->Twitter->refreshCache();
        }

        $timelines = $this->Tiwt->fetch($this->params['named']);
        $this->set(compact('timelines'));

    }

    function add() {

        $this->autoRender = false;

        if (!empty($this->data)) {
            if ( $this->Tiwt->teewt($this->data) ) {
                $this->Session->write('reflash', true); // キャッシュクリアフラグ
                $this->Session->setFlash($this->Tiwt->strrev('ツイートしたよ'));
            } else {
                $this->Session->setFlash($this->Tiwt->strrev('失敗したよ'));
            }
        }

        $this->redirect(array('action' => 'index'));

    }

}