<?php

namespace yii2tool\vendor\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class PackageEntity
 *
 * @package yii2tool\vendor\domain\entities
 *
 * @property string $alias
 * @property array $config
 */
class PackageEntity extends BaseEntity {

	protected $alias = null;
	protected $config;
	
}
