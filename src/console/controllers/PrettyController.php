<?php

namespace yii2module\vendor\console\controllers;

use Yii;
use yii2rails\extension\console\helpers\input\Select;
use yii2rails\extension\console\base\Controller;
use yii2rails\extension\console\helpers\Output;
use yii2mod\helpers\ArrayHelper;

class PrettyController extends Controller
{
	
	public function actionDomain()
	{
		$collection = \App::$domain->vendor->pretty->all();
		$domainAliases = ArrayHelper::getColumn($collection, 'path');
		
		$aliases = Select::display('Select domains', $domainAliases, true);
		$aliases = array_values($aliases);
		
		foreach($aliases as $alias) {
			\App::$domain->vendor->pretty->updateById($alias, []);
			Output::line($alias . ' ... OK');
		}
		
		Output::block('Success pretty');
	}
	
	/*public function actionDomain()
	{
		$domainAliases = \App::$domain->vendor->pretty->all();
		$domainAlias = Select::display('Select domain', $domainAliases);
		$domainAlias = ArrayHelper::first($domainAlias);
		$domainEntity = \App::$domain->vendor->pretty->oneById($domainAlias);
		prr($domainEntity,1,1);
	}*/
	
}
