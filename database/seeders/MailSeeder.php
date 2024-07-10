<?php

namespace Database\Seeders;

use App\Models\Mail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mails = [
            [
                'code' => '2024/SDM/001',
                'category_id' => 1,
                'title' => 'Undangan Rapat SDM',
                'file_path' => '2024/SDM/001.pdf',
            ],
            [
                'code' => '2024/SDM/002',
                'category_id' => 2,
                'title' => 'Pengumuman Rapat SDM',
                'file_path' => '2024/SDM/002.pdf',
            ],
            [
                'code' => '2024/SDM/003',
                'category_id' => 3,
                'title' => 'Nota Dinas Rapat SDM',
                'file_path' => '2024/SDM/003.pdf',
            ],
            [
                'code' => '2024/SDM/004',
                'category_id' => 4,
                'title' => 'Pemberitahuan Rapat SDM',
                'file_path' => '2024/SDM/004.pdf',
            ],
        ];

        foreach ($mails as $mail) {
            Mail::create($mail);
        }
    }
}
