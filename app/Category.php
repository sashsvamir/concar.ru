<?php

namespace App;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y.m.d H:i:s',
        'updated_at' => 'datetime:Y.m.d H:i:s',
    ];

    /**
     * @param $query QueryBuilder
     * @param  string  $slug
     * @return QueryBuilder
     */
    public function scopeSlug(QueryBuilder $query, string $slug)
    {
        return $query->where('slug', $slug);
    }

}
