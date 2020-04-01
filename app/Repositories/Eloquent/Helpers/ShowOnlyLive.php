<?php

namespace App\Repositories\Eloquent\Helpers;

use App\Repositories\Contracts\HelpersInterfaces\SingleHelperInterface;


class ShowOnlyLive implements SingleHelperInterface
{
	public function apply($entity)
	{
		return $entity->live();
	}
}