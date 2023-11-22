<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => '고양이', 'img' => '/img/cat.jpg', 'likes' => 0, 'content' => '고양고양이', 'created_at' => date('ymdhis'), 'updated_at' => date('ymdhis')]
            ,['name' => '말', 'img' => '/img/horse.jpg', 'likes' => 0, 'content' => '히이이잉', 'created_at' => date('ymdhis'), 'updated_at' => date('ymdhis')]
            ,['name' => '미어캣', 'img' => '/img/meerkat.jpg', 'likes' => 0, 'content' => '꾸이꾸이잉', 'created_at' => date('ymdhis'), 'updated_at' => date('ymdhis')]
        ];
        Board::insert($data);
    }
}
