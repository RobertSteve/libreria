<?php

use Illuminate\Database\Seeder;
class BookShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=100;$i++){
            DB::table('Book_Shops')->insert([
                'titulo'=> 'titulo'.$i,
                'autor' => 'autor'.$i,
                'tema'  => 'tema'.$i
            ]);
        }
    }
}
