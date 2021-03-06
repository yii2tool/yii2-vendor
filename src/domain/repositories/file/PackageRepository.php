<?php

namespace yii2tool\vendor\domain\repositories\file;

use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\store\StoreFile;
use yii2rails\extension\yii\helpers\FileHelper;
use yii2tool\vendor\domain\entities\PackageEntity;

class PackageRepository extends BaseRepository {
	
	public function load($alias = null) {
		$fileName = $this->getFileName($alias);
		$store = new StoreFile($fileName);
		$config = $store->load();
		return $this->forgeEntity([
			'alias' => $alias,
			'config' => $config,
		]);
	}
	
	public function save(PackageEntity $entity) {
		$fileName = $this->getFileName($entity->alias);
		$store = new StoreFile($fileName);
		$store->save($entity->config);
	}
	
	private function getFileName($alias = null) {
		$path = empty($alias) ? ROOT_DIR : FileHelper::getAlias($alias);
		return $path . DS . 'composer.json';
	}
	
}
