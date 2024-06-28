<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'The Lord Of The Ring',
            'author' => 'Syuaibun',
            'description' => 'Lorem Ipsum dolor sit amet',
            'price' => 40000,
            'img' => '1234'
        ]);

        Book::factory()
            ->count(10)
            ->create();
    }
}
