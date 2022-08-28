<?php

namespace App\Repositories;

use App\Models\StoreBuy as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class StoreCategoryRepository
 *
 * @package App\Repositories
 */

class StoreBuyRepository extends CoreRepository
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
            'user_id',
            'product_id',
            'created_at',
        ];
        $result = $this
            ->startConditions()
            ->select($fields)
            ->orderBy('id','DESC')
            ->with(['product', 'user'])
            ->with(['product'=>function($query){
                $query->select(['id','title'],);}
            ])
            ->paginate(25);

        return $result;
    }
}
