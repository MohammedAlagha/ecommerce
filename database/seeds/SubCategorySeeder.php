<?php

use Illuminate\Database\Seeder;
use App\Category;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class,10)->create([
            'parent_id'=>Category::whereNull('parent_id')->inRandomOrder()->first()->id,
        ]);
    }


}
