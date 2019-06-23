<?php

namespace yii2tool\vendor\domain\services;

use yii2rails\domain\services\base\BaseActiveService;
use yii2tool\vendor\domain\repositories\file\GitRepository;

/**
 * Class GitService
 *
 * @package yii2tool\vendor\domain\services
 *
 * @property-read GitRepository $repository
 * @property-read \yii2tool\vendor\domain\Domain $domain
 */
class GitService extends BaseActiveService {
	
	public $ignore;
	
	public function pull($entity) {
		return $this->repository->pull($entity);
	}
	
	public function push($entity) {
		return $this->repository->push($entity);
	}
	
	public function checkout($entity, $branch) {
		return $this->repository->checkout($entity, $branch);
	}
	
}
