<?php

namespace yii2module\vendor\domain\enums;

use yii2rails\extension\enum\base\BaseEnum;

class VersionTypeEnum extends BaseEnum {
	
	const MAJOR = 'major';
	const MINOR = 'minor';
	const PATCH = 'patch';
	
}