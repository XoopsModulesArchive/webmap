$Id: readme_jp.txt,v 1.4 2011/12/29 23:46:40 ohwada Exp $

=================================================
Version: 0.20
Date:    2011-11-29
Author:  Kenichi OHWADA
URL:     http://linux.ohwada.jp/
Email:   webmaster@ohwada.jp
=================================================

● 主な変更
1. PHP 5.3 対応
PHP 5.3.x で推奨されない機能 を修正した
http://www.php.net/manual/ja/migration53.deprecated.php
(1) new の返り値を参照で代入すること

2. MySQL 5.5 対応
(1) TYPE=MyISAM -> ENGINE=MyISAM

3. icon_1828_white.png を透過画像にする
http://linux.ohwada.jp/modules/newbb/viewtopic.php?forum=9&topic_id=988


=================================================
Version: 0.11
Date:    2009-05-17
=================================================

● 主な変更
1. バグ対策
(1) マーカーのinfo文にシングル・クォート (') があると、マップが表示できない


=================================================
Version: 0.10
Date:    2009-03-06
=================================================

Google Maps API を利用して地図を表示するモジュールです。
gamaps をベースに変更した。


● 主な機能
1. ユーザ機能
(1) 地図の検索：住所から地図を検索する
(2) 地図の表示：緯度経度を指定して特定の場所の地図を表示する
    KML をダウンロードして、GoogleEarth で見る
(3) GeoRSS：GeoRSS に対応した RSS から緯度経度を取得して、地図上に表示する

2. 管理者機能
(1) 地図から緯度・経度を取得して、データベースに格納する
(2) Google マップアイコンをアップロードする

3. API機能
他のモジュールが地図を表示するためのインタフェースを提供する

4. Google API Key
利用する場合は 下記よりAPI Key を取得してください
http://www.google.com/apis/maps/signup.html


● インストール
1. 共通 ( xoops 2.0.16a JP および XOOPS Cube 2.1.x )
解凍すると、html と xoops_trust_path の２つディレクトリがあります。
それぞれ、XOOPS の該当するディレクトリに格納ください。

イントール時に下記のような Warning が出ますが、
動作には支障ないので、無視してください。
-----
Warning [Xoops]: Smarty error: unable to read resource: "db:_inc_marker_js.html" in file class/smarty/Smarty.class.php line 1095
-----

2. xoops 2.0.18
上記に加えて
(1) preload ファイルをリネームする
XOOPS_TRUST_PATH/modules/webmap/preload/_constants.php (アンダーバーあり)
 -> constants.php (アンダーバーなし)

(2) _C_WEBMAP_PRELOAD_XOOPS_2018 を有効にする
先頭の // を削除する
-----
//define("_C_WEBBMAP_PRELOAD_XOOPS_2018", 1 ) ;
-----
