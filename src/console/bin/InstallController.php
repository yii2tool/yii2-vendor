<?php

namespace yii2tool\vendor\console\bin;

use Yii;
use yii\helpers\ArrayHelper;
use yii2rails\extension\console\helpers\input\Select;
use yii2rails\extension\console\helpers\Output;
use yii2rails\extension\console\base\Controller;

class InstallController extends \yii\base\Component
{
	
	/**
	 * Install package
	 */
	public function actionIndex()
	{
		list($owner, $name) = $this->inputPackage();
		\App::$domain->vendor->generator->install($owner, $name);
		Output::block('Success installed');
	}
	
	private function inputPackage() {
        $ownerNames = \App::$domain->package->group->allNames();
		$ownerSelect = Select::display('Select owner', $ownerNames);
		$owner = Select::getFirstValue($ownerSelect);
		$names = \App::$domain->vendor->info->shortNamesByOwner($owner);
		$nameSelect = Select::display('Select package', $names);
		$name = Select::getFirstValue($nameSelect);
		
		return [$owner, $name];
	}
}
