<?php

namespace App\Repositories;

use App\Models\StoreProduct as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class StoreCategoryRepository
 *
 * @package App\Repositories
 */

class StoreProductRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }


    /**
     * @param int|null $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $fields = [
            'id',
            'title',
            'slug',
            'price',
            'category_id',
            ];
        $result = $this
            ->startConditions()
            ->select($fields)
            ->orderBy('id','DESC')
            ->with(['category'])
            ->with(['category'=>function($query){
                $query->select(['id','title']);
            }])
            ->paginate(25);

        return $result;
    }
}
