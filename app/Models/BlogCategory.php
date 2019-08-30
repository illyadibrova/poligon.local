<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class BlogCategory
 *
 * @package App\Models
 *
 * @property-read BlogCategory $parentCategory
 * @property-read string       $parentTitle
 */

class BlogCategory extends Model
{
    use SoftDeletes;

    /**
     * Id корня
     */
    const ROOT = 1;

    protected $fillable
        = [
            'title',
            'slug',
            'parent_id',
            'description',
        ];

    /**
     *     /**
     * Получить родительскую категорию
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * Пример аксесуара (Accessor)
     *
     * @url https://laravel.com/docs/5.8/eloquent-mutators
     *
     * @return mixed|string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Корень'
                : '???');
        return $title;
    }


    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }
}
