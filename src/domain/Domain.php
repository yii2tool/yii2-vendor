<?php

namespace yii2tool\vendor\domain;

use yii2rails\domain\enums\Driver;

/**
 * Class Domain
 * 
 * @package yii2tool\vendor\domain
 * @property \yii2tool\vendor\domain\services\InfoService $info
 * @property \yii2tool\vendor\domain\services\PackageService $package
 * @property \yii2tool\vendor\domain\services\GitService $git
 * @property \yii2tool\vendor\domain\services\TestService $test
 * @property \yii2tool\vendor\domain\services\GeneratorService $generator
 * @property \yii2tool\vendor\domain\services\PrettyService $pretty
 * @property-read \yii2tool\vendor\domain\interfaces\repositories\RepositoriesInterface $repositories
 */
class Domain extends \yii2rails\domain\Domain {
	
	public function config() {
		return [
			'defaultDriver' => Driver::FILE,
			'repositories' => [
				'info',
				'package',
				'generator',
				'git',
				'test',
				'pretty',
			],
			'services' => [
				'info' => [
					'ignore' => [
						//'yii2module/yii2-test',
					],
				],
				'package' => [
					'aliases' => [
						'@root',
						//'@vendor/yii2bundle/yii2-application-template',
					],
				],
				'git',
				'test' => [
					'aliases' => [
						'api',
                        'backend',
                        'common',
                        'frontend',
                        'domain',
					],
				],
				'generator' => [
					'author' => 'Yamshikov Vitaliy',
					'email' => 'theyamshikov@yandex.ru',
				],
				'pretty',
			],
		];
	}
	
}