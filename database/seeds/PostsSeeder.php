<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = ['Rick and Morty','Game Of Thrones','Angelina Jolie','True Detective','Angelina Jolie Hollywood Star'];
        $img = ['http://wordsmith.ilgaraliyev.com/images/rick-and-morty.jpg','http://wordsmith.ilgaraliyev.com/images/game-of-thrones.jpg',
        'http://wordsmith.ilgaraliyev.com/images/angelina-jolie.jpg', 'http://wordsmith.ilgaraliyev.com/images/true-detective.jpg'
        ,'https://www.filmibeat.com/wimgm/1366x70/desktop/2016/02/angelina-jolie_145655752800.jpg'
    ];
    $content = ["Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum ",
"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin",
"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected",
'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.'
];
     for ($i=0; $i < count($title); $i++) { 
        DB::table('posts')->insert([
            'category_id' =>rand(1,4),
            'user_id' =>1,
            'title' => $title[$i],
            'slug' => Str::slug($title[$i]),
            'img' => $img[$i],
            'content' => $content[$i],
            
            ]);
     }   
    }
}
