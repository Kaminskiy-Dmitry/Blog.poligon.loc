<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogPost extends Model
{
    use SoftDeletes;

    /**
     * Категория статьи.
     *
     *@return BelongsTo
     */
    public function category()
    {
        //Статья принадлежат пользователю
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * Автор  статьи.
     *
     *@return BelongsTo
     */
    public function user()
    {
        //Статья пренадлежит пользователю
        return $this->belongsTo(User::class);
    }
}
