<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class Page extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'page';

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
     * @return QueryBuilder
     */
    public function scopeActive(QueryBuilder $query)
    {
        return $query->where('active', 1);
    }

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
