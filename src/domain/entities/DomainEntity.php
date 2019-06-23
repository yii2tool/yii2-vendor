<?php

namespace yii2tool\vendor\domain\entities;

use yii2rails\domain\BaseEntity;
use yii2rails\extension\common\helpers\ClassHelper;
use yii2rails\extension\yii\helpers\FileHelper;

/**
 * Class DomainEntity
 *
 * @package yii2tool\vendor\domain\entities
 *
 * @property $path
 * @property $directory_alias
 * @property $directory
 * @property $class_name
 * @property $repositories
 * @property $services
 * @property $interfaces
 * @property $entities
 */
class DomainEntity extends BaseEntity {
	
	protected $path;
	protected $directory_alias;
	protected $directory;
	protected $class_name;
	protected $repositories;
	protected $services;
	protected $interfaces;
	protected $entities;
	
	public function setPath($value) {
		$this->path = str_replace('\\', '/', $value);
	}
	
	public function getDirectory() {
		return FileHelper::getAlias($this->getDirectoryAlias());
	}
	
	public function getDirectoryAlias() {
		return FileHelper::normalizeAlias($this->path);
	}
	
	public function getClassName() {
		return ClassHelper::normalizeClassName($this->getDirectoryAlias() . SL . 'Domain');
	}
	
}
