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
 * @subpackage app.models
 */
class Tiwt extends AppModel {

    var $name = 'Tiwt';

    var $useTable = false; // テーブルを使用しない

    var $actsAs = array('TwitterKit.TwitterTweet');

    function fetch($options = array()) {
        $params = array();
        foreach (array('since_id', 'max_id', 'count', 'page') as $key) {
            if (!empty($options[$key])) {
                $params[$key] = $options[$key];
            }
        }
        // タイムラインを取得        
        $results = $this->getTwitterSource()->statuses_home_timeline($params);
        if (empty($results)) { return array(); }

        // ステータスを反転
        return array_map(array($this, '_reverse'), $results);
    }

    function teewt($data = null) {
        if (empty($data)) { $data = $this->data; }
        // ツイート
        return $this->tweet($this->strrev($data[$this->alias]['text']));
    }

    function _reverse($data) {
        if (empty($data)) { return array(); }
        $data['rev']['text'] = $this->strrev($data['text']);
        $data['rev']['user']['screen_name'] = $this->strrev($data['user']['screen_name']);
        return $data;
    }

    function strrev($str){
        preg_match_all('/./us', $str, $ar);
        return join('',array_reverse($ar[0]));
    }
}