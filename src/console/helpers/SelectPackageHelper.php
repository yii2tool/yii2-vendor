<?php

namespace yii2module\vendor\console\helpers;

use yii\base\Event;
use yii2rails\extension\console\helpers\input\Select;
use yii2rails\extension\console\helpers\Output;

class SelectPackageHelper {
	
	public static function inputPackage() {
		$owner = self::inputGroup();
		$name = self::inputName($owner);
		Output::line();
		return [$owner, $name];
	}
	
	public static function inputName($owner) {
		$names = \App::$domain->vendor->info->shortNamesByOwner($owner);
		$nameSelect = Select::display('Select package', $names);
		$name = Select::getFirstValue($nameSelect);
		return $name;
	}
	
	public static function inputGroup() {
		$ownerNames = \App::$domain->package->group->allNames();
		$ownerSelect = Select::display('Select owner', $ownerNames);
		$owner = Select::getFirstValue($ownerSelect);
		return $owner;
	}
	
}
