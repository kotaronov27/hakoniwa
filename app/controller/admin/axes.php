<?php
/**
 * 箱庭諸島 S.E
 * @author hiro <@hiro0218>
 */

require_once MODEL_PATH.'/Admin.php';
require_once MODEL_PATH.'/Cgi.php';
require_once PRESENTER_PATH.'/HtmlAxes.php';

 class Axes extends Admin {
 	public $init;

 	function __construct() {
 		global $init;
 		$this->init = $init;
 	}

 	function execute() {
 		$html = new HtmlAxes();
 		$cgi  = new Cgi();
 		$this->parseInputData();
 		$cgi->getCookies();
 		$html->header();

 		switch($this->mode) {
 			case "enter":
 				if($this->passCheck()) {
 					$html->main($this->dataSet);
 				}
 				break;
 			default:
 				$html->enter();
 				break;
 		}
 		$html->footer();
 	}

 }
