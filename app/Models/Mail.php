<?php

declare (strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Mail extends Model
{
    use HasFactory;

    protected $table = 'mails';

    protected $fillable = [
        'username',
        'email',
        'description',
        'status',
    ];

    public function getMails(): Collection
    {
        return DB::table($this->table)->select(['id', 'username', 'email', 'description', 'status', 'created_at', 'updated_at'])->get();
    }

    public function getMailById(int $id)
    {
        return DB::table($this->table)->find($id, ['id', 'username', 'email', 'description', 'status', 'created_at', 'updated_at']);
    }
}
