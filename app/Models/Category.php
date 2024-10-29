<?php

declare (strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'image',
    ];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'category_has_news', 'category_id', 'news_id', 'id', 'id');
    }

    public function getCategories(): Collection
    {
        return DB::table($this->table)->select(['id', 'title', 'slug', 'description', 'created_at', 'updated_at', 'status', 'image'])->get();
    }

    public function getCategoryById(int $id)
    {
        return DB::table($this->table)->find($id, ['id', 'title', 'slug', 'description', 'created_at', 'updated_at', 'status', 'image']);
    }

    public function getCategoryBySlug($slug) 
    {
        return DB::table($this->table)->find($slug, ['id', 'title', 'slug', 'description', 'created_at', 'updated_at', 'status', 'image']);
    }

    public function getCategoryIdBySlug($slug) 
    {
        return DB::table($this->table)->find($slug, ['id']);
    }
}
