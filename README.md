# Tiwt (Reverse Twit)

[第2回CakePHP勉強会@福岡にて発表][1]したサンプルアプリケーションです。

app/config/core.php, app/config/database.phpを書き換えて利用してください。

[http://tiwt.php-tips.com/][2] にて、デモをご覧いただけます。

## Installation

    git clone http://github.com/nojimage/tiwt.git

    git submodule init

 * chmod -R o+w app/tmp/
 * edit app/config/core.php
 * edit app/config/database.php

    cake/console/cake schema create TwitterKit.TwitterKit

Twitterの、OAuth Consumer Key, Consumer Secret は[dev.twitter.com][5]から取得してください。
git cloneではなく、zip等でダウンロードした場合は、[twitter_kit][3]、[debug_kit][4] をそれぞれ入手して、app/pluginsディレクトリへ設置してください。

## License

The MIT License

Copyright (c) 2010 nojimage, http://php-tips.com

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

  [1]: http://php-tips.com/php/cakephp-php/2010/07/cakephp-twitterkit-slid
  [2]: http://tiwt.php-tips.com/
  [3]: http://github.com/elstc/twitter_kit
  [4]: http://github.com/cakephp/debug_kit
  [5]: http://dev.twitter.com

