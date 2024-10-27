<?php

declare (strict_types=1);

namespace Database\Seeders;

use App\Enums\SectionStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('homes')->insert($this->getData());
    }

    public function getData(): array
    {
        $nowData = now();
        for ($i=0; $i<5; $i++) {
            $data[] = [
                'title' => \fake()->jobTitle(),
                'resume' => \fake()->text(50),
                'description' => \fake()->text(200),
                'is_visible' => true,
                'status' => SectionStatus::ACTIVE->value,
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ];
        }
        return $data;
    }
}
