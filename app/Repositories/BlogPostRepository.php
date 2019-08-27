<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26.08.2019
 * Time: 10:38
 */

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogPostRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить список статей для вывода в списке
     * (Админка)
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];

        $result = $this->startConditions()
                       ->select($columns)
                       ->orderBy('id', 'DESC')
                       ->with([
                           'category' => function($query) {
                           $query->select(['id', 'title']);
                           },
                           'user:id,name',
                       ])
                       ->paginate(25);

        return $result;
    }

    /**
     * Ролучить модель для редактирования в админке
     *
     * @param $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }
}