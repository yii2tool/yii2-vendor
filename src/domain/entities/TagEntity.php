<?php

namespace yii2tool\vendor\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class PackageEntity
 *
 * @package yii2tool\vendor\domain\entities
 *
 * @property string $full_name
 * @property array $sha
 */
class TagEntity extends BaseEntity {

	protected $full_name;
	protected $sha;
	
	public function getVersion() {
		return trim($this->name, 'v');
	}
	
	public function getName() {
		return str_replace('refs/tags/', '', $this->full_name);
	}
	
	public function fields() {
		$fields = parent::fields();
		$fields['name'] = 'name';
		$fields['version'] = 'version';
		return $fields;
	}

}
