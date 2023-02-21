<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Exception;

class CategorySeeder extends DatabaseSeeder
{
    public function run()
    {
        $sections = $this->getFixture('categories.json');

        foreach ($sections as $slug => $section) {
            $sec = $this->createCategory($slug, $section);

            foreach ($section['subcategories'] as $category_slug => $category) {
                $cat = $this->createCategory($category_slug, $category, $sec->id);

                foreach ($category['subcategories'] as $sub_slug => $subcategory) {
                    $this->createCategory($sub_slug, $subcategory, $cat->id);
                }
            }
        }
    }

    private function createCategory($slug, $category, $parentId = null)
    {
        $attributes = ['slug' => $slug, 'name' => $category['title'], 'parent_id' => $parentId];

        return Category::create($attributes);
    }
}
