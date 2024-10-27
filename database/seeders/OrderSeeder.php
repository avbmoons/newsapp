<?php

declare (strict_types=1);

namespace Database\Seeders;

use App\Enums\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('orders')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        for ($i=0; $i<10; $i++) {
            $data[] = [
                'username' => \fake()->userName(),
                'phone' => \fake()->phoneNumber(),
                'email' => \fake()->email(),
                'orderinfo' => \fake()->text(100),                
                'status' => OrderStatus::DRAFT->value,
                'created_at' => \now(),
                'updated_at' => \now(),

            ];
        }
        return $data;
    }
}
