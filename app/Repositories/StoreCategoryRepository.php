<?php

namespace App\Repositories;

use App\Models\StoreCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class StoreCategoryRepository
 *
 * @package App\Repositories
 */

class StoreCategoryRepository extends CoreRepository
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
     * @return Collection
     */
    public function getForComboBox()
    {
        $fields = implode(', ',[
            'id',
            'CONCAT (id,". ", title) AS title',
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($fields)
            ->toBase()
            ->get();
        return $result;
    }

    /**
     * @param int|null $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function getAllWithPaginate($perPage = null)
    {
        $fields = ['id', 'title', 'parent_id'];
        return $this
            ->startConditions()
            ->select($fields)
            ->paginate($perPage);
    }
}
