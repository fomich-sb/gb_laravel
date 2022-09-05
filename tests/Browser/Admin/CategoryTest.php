<?php

namespace Tests\Browser\Admin;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function testCreateForm(): void
    {
        $category = Category::factory()->create();

        $this->browse(static function (Browser $browser) use($category) {
            $browser->visit('/admin/category/create')
                    ->type('caption', $category->caption)
                    ->type('description', $category->description)
                    ->press('Сохранить')
                    ->assertPathIs('/admin/category');
        });
    }
    public function testUpdateForm(): void
    {
        $category = Category::factory()->create();

        $this->browse(static function (Browser $browser) use($category) {
            $browser->visit('/admin/category/1/edit')
                    ->type('description', $category->description)
                    ->press('Сохранить')
                    ->assertPathIs('/admin/category');
        });
    }
}