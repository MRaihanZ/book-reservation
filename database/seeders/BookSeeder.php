<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [

            [
                'title' => 'Laravel 12 Dasar',
                'author' => 'Taylor Otwell',
                'publisher' => 'Laravel Press',
                'category' => 'Programming',
                'publish_year' => 2025,
            ],

            [
                'title' => 'PHP Modern',
                'author' => 'John Doe',
                'publisher' => 'Tech Press',
                'category' => 'Programming',
                'publish_year' => 2024,
            ],

            [
                'title' => 'Basis Data',
                'author' => 'Budi Santoso',
                'publisher' => 'Informatika',
                'category' => 'Database',
                'publish_year' => 2023,
            ],

            [
                'title' => 'Pemrograman Web',
                'author' => 'Andi Wijaya',
                'publisher' => 'Informatika',
                'category' => 'Web',
                'publish_year' => 2024,
            ],

            [
                'title' => 'Algoritma dan Struktur Data',
                'author' => 'Rinaldi Munir',
                'publisher' => 'Informatika',
                'category' => 'Algorithm',
                'publish_year' => 2022,
            ],

        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
