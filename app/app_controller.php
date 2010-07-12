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
 * @subpackage app
 */
class AppController extends Controller
{
    var $components = array(
        'Session',
        'Auth',
        'DebugKit.Toolbar' => array('history' => false),
    );

    var $helpers = array(
        'Html',
        'Form',
        'Session',
        'Js',
    );

    /**
     *
     * @var AuthComponent
     */
    public $Auth;

    /**
     *
     * @var SessionComponent
     */
    public $Session;

    public function beforeFilter() {
        $this->Auth->authorize = 'controller';
        $this->Auth->userModel = 'TwitterKit.TwitterKitUser';
        $this->Auth->loginAction = array('plugin' => 'twitter_kit', 'controller' => 'users', 'action' => 'login');
    }

    public function isAuthorized() {
        // set OAuth
        ConnectionManager::getDatasource('twitter')->setToken(
        $this->Auth->user('oauth_token'), $this->Auth->user('oauth_token_secret')
        );
        return true;
    }
}
