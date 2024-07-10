<?php

namespace Database\Seeders;

use App\Models\MailCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MailCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Undangan',
                'description' => 'Surat undangan kegiatan resmi',
            ],
            [
                'name' => 'Pengumuman',
                'description' => 'Surat pengumuman informasi',
            ],
            [
                'name' => 'Nota Dinas',
                'description' => 'Surat nota dinas resmi',
            ],
            [
                'name' => 'Pemberitahuan',
                'description' => 'Surat pemberitahuan penting',
            ],
        ];

        foreach ($categories as $category) {
            MailCategory::create($category);
        }
    }
}
