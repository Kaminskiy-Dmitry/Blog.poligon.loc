<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogCategoryRepository.
 */
class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить модель для редакции в админке
     * @param int $id
     *
     * @return model
     */
    public function getEdit(int $id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Получить список категорийдля вывода в выпадающем списке.
     *
     * @return Collection
     */

    public function getForComboBox()
    {

        $columns = implode(',',[
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

        /*
        //1
        $result[] = $this->startConditions()->all();

        //2
        $result[] = $this
        ->startConditions()
        ->select('blog_categories.*',
        \DB::raw('CONCAT (id, ". ", title) AS id_title'))
        ->toBase()
        ->get();

        //3
        */

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * Получить все записи для вывода пагинатором
     *
     * @param int|null $perPage
     *
     * return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            /***/
            ->paginate($perPage);

        return $result;
    }

}
