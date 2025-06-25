<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::firstOrCreate([
            'name' => 'Nguyễn Văn A',
        ], [
            'title' => 'Full Stack Developer',
            'email' => 'nguyenvana@example.com',
            'phone' => '0123456789',
            'address' => 'Hà Nội, Việt Nam',
            'birthday' => '1990-01-01',
            'summary' => 'Tôi là một Full Stack Developer với 5 năm kinh nghiệm trong việc phát triển web application. Tôi có kiến thức sâu rộng về các công nghệ frontend và backend, cũng như kinh nghiệm làm việc với các framework phổ biến.',
            'skills' => "PHP/Laravel\nJavaScript/Vue.js\nHTML/CSS\nMySQL/PostgreSQL\nGit\nDocker\nAWS\nRESTful APIs",
            'experience' => "Senior Developer - Công ty ABC (2020-2023)\n- Phát triển và maintain các web application\n- Làm việc với team 10+ developers\n- Mentor junior developers\n\nJunior Developer - Công ty XYZ (2018-2020)\n- Phát triển các tính năng mới\n- Bug fixing và optimization\n- Code review",
            'education' => "Đại học Bách Khoa Hà Nội (2014-2018)\n- Chuyên ngành: Công nghệ thông tin\n- GPA: 3.8/4.0\n\nTrường THPT Chuyên (2011-2014)\n- Chuyên Toán - Tin",
            'social_links' => json_encode([
                [
                    'name' => 'GitHub',
                    'url' => 'https://github.com/nguyenvana'
                ],
                [
                    'name' => 'LinkedIn',
                    'url' => 'https://linkedin.com/in/nguyenvana'
                ],
                [
                    'name' => 'Facebook',
                    'url' => 'https://facebook.com/nguyenvana'
                ]
            ]),
        ]);
    }
} 