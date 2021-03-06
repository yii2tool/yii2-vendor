<?php

namespace yii2tool\vendor\domain\entities;

use yii\helpers\ArrayHelper;
use yii2rails\domain\BaseEntity;
use yii2rails\domain\values\TimeValue;

/**
 * Class PackageEntity
 *
 * @package yii2tool\vendor\domain\entities
 *
 * @property $sha
 * @property $author
 * @property $date
 * @property $message
 * @property $tag
 */
class CommitEntity extends BaseEntity {

	protected $sha;
	protected $author;
	protected $date;
	protected $message;
	protected $tag;
	
	public function fieldType() {
		return [
			'tag' => [
				'type' => TagEntity::class,
			],
			'date' => TimeValue::class,
		];
	}
	
	public function getAuthorName() {
		$arr = explode(SPC, $this->author);
		return ArrayHelper::getValue($arr, '0');
	}
	
	public function getAuthorEmail() {
		$arr = explode(SPC, $this->author);
		$email = ArrayHelper::getValue($arr, '1');
		$email = trim($email, '<>');
		return $email;
	}
}
