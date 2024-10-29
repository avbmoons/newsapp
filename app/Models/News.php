<?php

declare (strict_types=1);

namespace App\Models;

//use Illuminate\Database\Eloquent\Collection;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Category;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'author',
        'status',
        'description',
        'image',
        'source_id',
    ];

    protected $casts = [
        'category_ids' => 'array',
        'source_id' => 'integer',
    ];

    // protected function author(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value): string => strtoupper($value),
    //         set: fn ($value): string => strtolower($value),
    //     );
    // }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_has_news', 'news_id', 'category_id', 'id', 'id');
    }

    public function newsSource()
    {
        return $this->belongsTo(NewsSource::class, 'source_id', 'id');
    }

    public function getNews(): Collection
    {
        return DB::table($this->table)->select(['id', 'title', 'description', 'author', 'status', 'created_at', 'source_id'])->get();
    }

    public function getNewsById(int $id)
    {
        return DB::table($this->table)->find($id, ['id', 'title', 'author', 'source_id']);
    }

    public function getNewsByCategorySlug($slug)
    {
        $id = $this->category->getCategoryIdBySlug($slug);     
        
        $news = [];
        foreach ($this->getAll() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }
}
