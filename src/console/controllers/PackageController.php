<?php

namespace yii2tool\vendor\console\controllers;

use yii2rails\extension\console\helpers\Alert;
use yii2rails\extension\console\helpers\input\Enter;
use yii2rails\extension\console\helpers\Output;
use yii2rails\extension\console\base\Controller;
use yii2rails\extension\package\helpers\ConfigHelper;
use yii2rails\extension\package\helpers\PackageHelper;

class PackageController extends Controller {
	
	public function init() {
		parent::init();
		Output::line();
	}
	
	public function actionDownload() {
		$group = Enter::display('Vendor name');
		$package = Enter::display('Package name');
		PackageHelper::forge($group, $package);
		Alert::success('Package downloaded and installed!');
	}
	
	public function actionInstall() {
		$group = Enter::display('Vendor name');
		$package = Enter::display('Package name');
		ConfigHelper::addPackage($group, $package);
		Alert::success('Package installed!');
	}
	
}
