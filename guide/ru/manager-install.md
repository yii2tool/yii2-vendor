Установка
===

Устанавливаем зависимость:

```
composer require yii2module/yii2-vendor
```

Объявляем console модуль:

```php
return [
	'modules' => [
		// ...
		'vendor' => [
			'class' => 'yii2tool\vendor\console\Module',
		],
		// ...
	],
];
```

Объявляем домен:

```php
return [
	'components' => [
		// ...
		'vendor' => [
        			'class' => 'yii2rails\domain\Domain',
        			'path' => 'yii2tool\vendor\domain',
        			'repositories' => [
        				'generator' => Driver::FILE,
        			],
        			'services' => [
        				'generator' => [
        					'author' => 'Author name',
        					'email' => 'author@email.com',
        					'owners' => [
					            'yii2bundle',
        					],
        				],
        			],
        		],
		// ...
	],
];
```
