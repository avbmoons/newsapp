<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;

trait NewsTrait
{
    use News;

    public static function getNews(): array
    {
        return News::newsGen();
    }

    public static function getNewsId($id): ?array
    {
        foreach (static::getNews() as $news) {
            if ($news['id'] == $id) {
                return $news;
            }
        }
        return null;
    }

    // public function getNews($id = null)
    // {
    //     $news = [];
    //     $quantitynews = 10;

    //     if ($id === null) {
    //         for($i=1; $i < $quantitynews; $i++) {
    //             $news[$i] = [
    //                 'id' => $i,
    //                 'title' => \fake() -> jobTitle(),
    //                 'description' => \fake() -> text(100),
    //                 'author' => \fake() -> userName(),
    //                 'created_at' => \now() -> format('d-m-y H:i'),
    //             ];
    //         }
    //         return $news;
    //     }
    //     return [
    //         'id' => $id,
    //         'title' => \fake() -> jobTitle(),
    //         'description' => \fake() -> text(100),
    //         'author' => \fake() -> userName(),
    //         'created_at' => \now() -> format('d-m-y H:i'),
    //     ];
    // }
}