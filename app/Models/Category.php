<?php

declare (strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
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

    public function getCategories(): Collection
    {
        // return DB::select("select id, title, slug,  description, created_at from {$this->table}");
        return DB::table($this->table)->select(['id', 'title', 'slug', 'description', 'created_at', 'updated_at', 'status', 'image'])->get();
    }

    public function getCategoryById(int $id)
    {
        // return DB::selectOne("select id, title, slug, description, created_at from {$this->table} where id = :id", [
        //     'id' => $id
        // ]);
        return DB::table($this->table)->find($id, ['id', 'title', 'slug', 'description', 'created_at', 'updated_at', 'status', 'image']);
    }
}
