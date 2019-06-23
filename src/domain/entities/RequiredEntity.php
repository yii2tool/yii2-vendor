<?php

namespace yii2tool\vendor\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class PackageEntity
 *
 * @package yii2tool\vendor\domain\entities
 *
 * @property $name
 * @property $version
 * @property $alias
 */
class RequiredEntity extends BaseEntity {

	protected $name;
	protected $version;
	protected $alias;
	
}
