<?php

namespace yii2tool\vendor\domain\repositories\file;

use yii2rails\domain\repositories\BaseRepository;
use yii2tool\vendor\domain\entities\RepoEntity;
use yii2tool\vendor\domain\helpers\RepositoryHelper;

class GitRepository extends BaseRepository {
	
	public function pull(RepoEntity $entity) {
		$repo = RepositoryHelper::gitInstance($entity->package);
		$repo->checkout('master');
		$result = $repo->pullWithInfo();
		if($result == 'Already up-to-date.') {
			return false;
		} else {
			return $result;
		}
	}
	
	public function push(RepoEntity $entity) {
		$repo = RepositoryHelper::gitInstance($entity->package);
		$repo->pushWithInfo();
	}
	
	public function checkout(RepoEntity $entity, $branch) {
		$repo = RepositoryHelper::gitInstance($entity->package);
		$repo->checkout($branch);
	}
	
}
