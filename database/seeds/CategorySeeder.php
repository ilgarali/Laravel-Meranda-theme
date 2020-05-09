<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Tv-series','Stars','Movies','DESIGN','SPORT'];
        for ($i=0; $i <count($categories); $i++) { 
            DB::table('categories')->insert([
                'category' => $categories[$i],
                'slug' =>Str::slug($categories[$i])
            ]);
        }
    }
}
