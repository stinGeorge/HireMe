<?php

use HireMe\Entities\Category;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
        Category::create([
            'name' => 'Backend developers',
            'slug' => 'backend-developers'
        ]);
        Category::create([
            'name' => 'Frontend developers',
            'slug' => 'frontend-developers'
        ]);
		Category::create([
            'name' => 'Designers',
            'slug' => 'designers'
        ]);
	}

}