<?php

namespace App\Repositories\Eloquent\Helpers;

use App\Repositories\Contracts\HelpersInterfaces\SingleHelperInterface;


class LatestFirst implements SingleHelperInterface
{
	public function apply($entity)
	{
		return $entity->latest();
	}
}