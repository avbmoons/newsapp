<?php

declare(strict_types=1);

namespace App\Models;

class Category
{
    private array $categories = [
        1 => [
            'id' => 1,
            'title' => 'Спорт',
            'slug' => 'sport',
        ],
        2 => [
            'id' => 2,
            'title' => 'Политика',
            'slug' => 'politics',
        ],
        3 => [
            'id' => 3,
            'title' => 'Экология',
            'slug' => 'ecology',
        ],
        4 => [
            'id' => 4,
            'title' => 'Экономика',
            'slug' => 'economy',
        ],
        5 => [
            'id' => 5,
            'title' => 'Искусство',
            'slug' => 'art',
        ],
    ];

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function getCategoryById($id)
    {
        foreach (static::getCategories() as $categories) {
            if ($categories['id'] == $id) {
                return $categories;
            }
        }
        return null;
    }

    public function getCategoryIdBySlug($slug)
    {
        $id=null;
        foreach ($this->getCategories() as $category){
            if ($category['slug'] == $slug){
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public function getCategoryNameBySlug($slug)
    {
        $id = $this->getCategoryIdBySlug($slug);
        $category = $this->getCategoryById($id);
        if ($category !=[])
            return $category['title'];
        else return null;
    }
}
