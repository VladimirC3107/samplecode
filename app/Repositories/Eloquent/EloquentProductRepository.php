<?php

namespace Repositories\Eloquent;




use App\Models\Product;
use App\Repositories\RepositoryAbstract;
use App\Repositories\Contracts\Repository\ProductRepository;


class EloquentProductRepository extends RepositoryAbstract implements ProductRepository
{
	public function entity()
	{
		return Product::class;
	}
}