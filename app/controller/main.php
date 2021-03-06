<?php
/**
 * 箱庭諸島 S.E
 * @author hiro <@hiro0218>
 */

require_once MODEL_PATH.'/Cgi.php';
require_once MODEL_PATH.'/Turn.php';
require_once MODEL_PATH.'/File/Hako.php';
require_once MODEL_PATH.'/Make/Core.php';
require_once MODEL_PATH.'/Make/MakeJS.php';
require_once PRESENTER_PATH.'/HtmlTop.php';
require_once PRESENTER_PATH.'/HtmlMap.php';
require_once PRESENTER_PATH.'/HtmlMapJS.php';

class Main {

	function execute() {
		$hako = new Hako();
		$cgi  = new Cgi();

		$cgi->parseInputData();
		$cgi->getCookies();

		if(!$hako->readIslands($cgi)) {
            Util::renderErrorPage();
			exit();
		}
		$lock = Util::lock();
		if(FALSE == $lock) {
			exit();
		}
		$cgi->setCookies();

		$_developmode = $cgi->dataSet['DEVELOPEMODE'] ?? "";
		if( mb_strtolower($_developmode) == "javascript") {
			$html = new HtmlMapJS();
			$com  = new MakeJS();
		} else {
			$html = new HtmlMap();
			$com  = new Make();
		}
		switch($cgi->mode) {
			case "turn":
				$turn = new Turn();
				$html = new HtmlTop();
				$html->header();
				$turn->turnMain($hako, $cgi->dataSet);
				$html->main($hako, $cgi->dataSet); // ターン処理後、TOPページopen
				$html->footer();
				break;

			case "owner":
				$html->header();
				$html->owner($hako, $cgi->dataSet);
				$html->footer();
				break;

			case "command":
				$html->header();
				$com->commandMain($hako, $cgi->dataSet);
				$html->footer();
				break;

			case "comment":
				$html->header();
				$com->commentMain($hako, $cgi->dataSet);
				$html->footer();
				break;

			case "print":
				$html->header();
				$html->visitor($hako, $cgi->dataSet);
				$html->footer();
				break;

			case "targetView":
				$html->head();
				$html->printTarget($hako, $cgi->dataSet);
				//$html->footer();
				break;

			default:
				$html = new HtmlTop();
				$html->header();
				$html->main($hako, $cgi->dataSet);
				$html->footer();
		}
		Util::unlock($lock);
		exit();
	}
}
