<?php

namespace yii2tool\vendor\domain\repositories\file;

use yii2rails\extension\scenario\collections\ScenarioCollection;
use yii2rails\extension\scenario\helpers\ScenarioHelper;
use yii2rails\domain\repositories\BaseRepository;

class GeneratorRepository extends BaseRepository {
	
	const GENERATOR_DIR = 'yii2tool\vendor\domain\commands\generators\\';
	const INSTALL_DIR = 'yii2tool\vendor\domain\commands\install\\';
	
	/**
	 * @param $config
	 * @param $name
	 *
	 * @return mixed
	 * @throws \yii\base\InvalidConfigException
	 * @throws \yii\web\ServerErrorHttpException
	 */
	public function generate($config, $name) {
		$config['class'] = self:: GENERATOR_DIR. $name;
		$filterCollection = new ScenarioCollection($config);
		return $filterCollection->runAll();
	}
	
	/**
	 * @param $config
	 * @param $name
	 *
	 * @return mixed
	 * @throws \yii\base\InvalidConfigException
	 * @throws \yii\web\ServerErrorHttpException
	 */
	public function install($config, $name) {
		$config['class'] = self::INSTALL_DIR . $name;
		$filterCollection = new ScenarioCollection($config);
		return $filterCollection->runAll();
	}
	
}
