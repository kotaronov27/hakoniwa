<?php
/**
 * 箱庭諸島 S.E - 管理者モード用ファイル -
 * @copyright 箱庭諸島 ver2.30
 * @since 箱庭諸島 S.E ver23_r09 by SERA
 * @author hiro <@hiro0218>
 */

require_once 'config.php';
require_once MODEL_PATH.'/hako-cgi.php';
require_once PRESENTER_PATH.'/hako-html.php';
require_once CONTROLLER_PATH.'/admin/index.php';

$start = new Admin();
$start->execute();
