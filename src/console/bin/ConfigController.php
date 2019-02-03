<?php

namespace yii2module\vendor\console\bin;

use Yii;
use yii2rails\extension\console\helpers\Output;
use yii2rails\extension\console\base\Controller;

class ConfigController extends \yii\base\Component
{
	
	public function init() {
		parent::init();
		Output::line();
	}
	
	/**
	 * Set dev-master package version
	 */
	public function actionToDev()
	{
		Output::line('Set dev-master package version...');
		\App::$domain->vendor->package->versionToDev();
		Output::block('Success converted version to dev-master');
	}
	
	/**
	 * Set new package version
	 */
	public function actionUpdate()
	{
		Output::line('Getting package info...');
		\App::$domain->vendor->package->versionUpdate();
		Output::block('Packages version updated');
	}
	
}
