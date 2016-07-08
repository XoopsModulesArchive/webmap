$Id: readme_en.txt,v 1.4 2011/12/29 23:46:40 ohwada Exp $

=================================================
Version: 0.20
Date:   2011-12-29
Author: Kenichi OHWADA
URL:    http://linux2.ohwada.net/
Email:  webmaster@ohwada.net
=================================================

* Main changes *
1. Migrating to PHP 5.3
Deprecated features in PHP 5.3.x
http://www.php.net/manual/en/migration53.deprecated.php
(1) Assigning the return value of new by reference is now deprecated.

2. Migrating to MySQL 5.5
(1) TYPE=MyISAM -> ENGINE=MyISAM

3. replece icon_1828_white.png to transparent type
http://linux.ohwada.jp/modules/newbb/viewtopic.php?forum=9&topic_id=988


=================================================
Version: 0.11
Date:   2009-05-17
=================================================

* Main changes *
1. buf fix
(1) not show map if single quote (') in map info


=================================================
Version: 0.10
Date:   2009-03-01
=================================================

This module is the map using Google Maps API
It changed base on gamaps module.


* Main features *
1. User features
(1) Search Map: Search map from address
(2) Show Map: Show map which is specified latitude and longitude
    Download KML and show in GoogleEarth
(3) GeoRSS: Show marker on the map, getting latitude and longitude by RSS supporing GeoRSS

2. Admin features
(1) The admin get latitude and longitude from map, and save them in database
(2) The admin upload the Google Map Icon.

3. API features
This modules provide the interface for the other module to show the map.

4. Google API Key
Get the API key on following, when you use Google Maps
http://www.google.com/apis/maps/signup.html


* Install *
1. common ( xoops 2.0.16a JP and XOOPS Cube 2.1.x )
When you unzip the zip file, there are two directories html and xoops_trust_path.
Please copy in the directory which XOOPS correspond

When you install, the xoops output warning like the following.
Please ignore, because xoops and webphoto work well.
-----
Warning [Xoops]: Smarty error: unable to read resource: "db:_inc_makrer_js.html" in file class/smarty/Smarty.class.php line 1095
-----

2. xoops 2.0.18
in addition to the above

(1) rename preload file.
XOOPS_TRUUST_PATH/modules/webmap/preload/_constants.php (with undebar)
 -> constants.php (without undebar)

(2) change _C_WEBMAP_PRELOAD_XOOPS_2018 in valid
remove // at the head.
-----
//define("_C_WEBMAP_PRELOAD_XOOPS_2018", "1" )
-----
