<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent_category()
    {
        return $this->belongsTo(__CLASS__);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function child_category()
    {
        return $this->hasMany(__CLASS__);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
