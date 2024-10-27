<?php

declare (strict_types=1);

namespace Database\Seeders;

use App\Enums\NewsSourceStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('news_sources')->insert($this->getData());
    }

    private function getData(): array
    {
        $nowData = now();
        for ($i=0; $i<10; $i++) {
            $data[] = [
                'title' => \fake()->jobTitle(),
                'description' => \fake()->text(100),
                'url' => \fake()->url(),
                'status' => NewsSourceStatus::DRAFT->value,
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ];
        }
        return $data;
    }
}
