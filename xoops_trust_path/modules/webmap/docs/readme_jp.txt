$Id: readme_jp.txt,v 1.4 2011/12/29 23:46:40 ohwada Exp $

=================================================
Version: 0.20
Date:    2011-11-29
Author:  Kenichi OHWADA
URL:     http://linux.ohwada.jp/
Email:   webmaster@ohwada.jp
=================================================

�� ����ѹ�
1. PHP 5.3 �б�
PHP 5.3.x �ǿ侩����ʤ���ǽ ��������
http://www.php.net/manual/ja/migration53.deprecated.php
(1) new ���֤��ͤ򻲾Ȥ��������뤳��

2. MySQL 5.5 �б�
(1) TYPE=MyISAM -> ENGINE=MyISAM

3. icon_1828_white.png ��Ʃ������ˤ���
http://linux.ohwada.jp/modules/newbb/viewtopic.php?forum=9&topic_id=988


=================================================
Version: 0.11
Date:    2009-05-17
=================================================

�� ����ѹ�
1. �Х��к�
(1) �ޡ�������infoʸ�˥��󥰥롦�������� (') ������ȡ��ޥåפ�ɽ���Ǥ��ʤ�


=================================================
Version: 0.10
Date:    2009-03-06
=================================================

Google Maps API �����Ѥ����Ͽޤ�ɽ������⥸�塼��Ǥ���
gamaps ��١������ѹ�������


�� ��ʵ�ǽ
1. �桼����ǽ
(1) �Ͽޤθ��������꤫���Ͽޤ򸡺�����
(2) �Ͽޤ�ɽ�������ٷ��٤���ꤷ������ξ����Ͽޤ�ɽ������
    KML ���������ɤ��ơ�GoogleEarth �Ǹ���
(3) GeoRSS��GeoRSS ���б����� RSS ������ٷ��٤�������ơ��Ͽ޾��ɽ������

2. �����Ե�ǽ
(1) �Ͽޤ�����١����٤�������ơ��ǡ����١����˳�Ǽ����
(2) Google �ޥåץ�������򥢥åץ��ɤ���

3. API��ǽ
¾�Υ⥸�塼�뤬�Ͽޤ�ɽ�����뤿��Υ��󥿥ե��������󶡤���

4. Google API Key
���Ѥ������ �������API Key ��������Ƥ�������
http://www.google.com/apis/maps/signup.html


�� ���󥹥ȡ���
1. ���� ( xoops 2.0.16a JP ����� XOOPS Cube 2.1.x )
���ह��ȡ�html �� xoops_trust_path �Σ��ĥǥ��쥯�ȥ꤬����ޤ���
���줾�졢XOOPS �γ�������ǥ��쥯�ȥ�˳�Ǽ����������

����ȡ�����˲����Τ褦�� Warning ���Фޤ�����
ư��ˤϻپ�ʤ��Τǡ�̵�뤷�Ƥ���������
-----
Warning [Xoops]: Smarty error: unable to read resource: "db:_inc_marker_js.html" in file class/smarty/Smarty.class.php line 1095
-----

2. xoops 2.0.18
�嵭�˲ä���
(1) preload �ե�������͡��ह��
XOOPS_TRUST_PATH/modules/webmap/preload/_constants.php (��������С�����)
 -> constants.php (��������С��ʤ�)

(2) _C_WEBMAP_PRELOAD_XOOPS_2018 ��ͭ���ˤ���
��Ƭ�� // ��������
-----
//define("_C_WEBBMAP_PRELOAD_XOOPS_2018", 1 ) ;
-----
