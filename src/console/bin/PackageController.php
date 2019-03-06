<?php

namespace yii2module\vendor\console\bin;

use yii2module\vendor\console\helpers\SelectPackageHelper;
use yii2rails\extension\console\helpers\Alert;
use yii2rails\extension\console\helpers\input\Enter;
use yii2rails\extension\console\helpers\input\Select;
use yii2rails\extension\console\helpers\Output;
use yii2rails\extension\console\base\Controller;
use yii2rails\extension\package\helpers\ConfigHelper;
use yii2rails\extension\package\helpers\PackageHelper;

class PackageController extends \yii\base\Component {
	
	public function init() {
		parent::init();
		Output::line();
	}
	
	public function actionDownload() {
		$group = SelectPackageHelper::inputGroup();
		//$group = Enter::display('Vendor name');
		$package = Enter::display('Package name');
		PackageHelper::forge($group, $package);
		Alert::success('Package downloaded and installed!');
	}
	
	public function actionInstall() {
		list($group, $package) = SelectPackageHelper::inputPackage();
		ConfigHelper::addPackage($group, $package);
		Alert::success('Package installed!');
	}
	
}
