<?php

declare (strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;

    protected $table = 'homes';

    protected $fillable = [
        'title',
        'resume',
        'description',
        'is_visible',
        'status',
        'image',
    ];

    protected $casts = [
        // 'is_visible' => SectionVisible::class,
        'is_visible' => 'boolean',
    ];

    public function getHomes(): Collection
    {
        return DB::table($this->table)->select(['id', 'title', 'resume', 'description', 'is_visible', 'status', 'created_at', 'updated_at', 'image'])->get();
    }

    public function getHomeById(int $id): mixed
    {
        return DB::table($this->table)->find($id, ['id', 'title', 'resume', 'description', 'is_visible', 'status', 'created_at', 'updated_at', 'image']);
    }
}
