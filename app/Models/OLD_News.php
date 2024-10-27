<?php

declare(strict_types=1);

namespace App\Models;

//use App\Http\Controllers\NewsTrait;

class News
{
    // use NewsTrait;
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public static function newsGen($id = null): array
    {
        $news = [];
        $quantityNews = 20;

        if ($id === null) {
            for($i=1; $i < $quantityNews; $i++) {
                $news[$i] = [
                    'id' => $i,
                    'category_id' => \random_int(1,5),
                    'category_title' => \fake() ->text(8),
                    'title' => \fake() -> jobTitle(),
                    'description' => \fake() -> text(100),
                    'author' => \fake() -> userName(),
                    'created_at' => \now() -> format('d-m-y H:i'),
                ];
            }
            return $news;
        }
    }

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

    public function getNewsByCategorySlug($slug): array
    {
        //$id = $this->category->getCatego
        $id = $this->category->getCategoryIdBySlug($slug);
        $news = [];
        foreach ($this->getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

}
