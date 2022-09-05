<?php

namespace Tests\Browser\Admin;

use App\Models\News;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function testCreateForm(): void
    {
        $News = News::factory()->create();

        $this->browse(static function (Browser $browser) use($News) {
            $browser->visit('/admin/news/create')
                    ->type('title', $News->title)
                    ->select('category_id', $News->category_id)
                    ->select('source_id', $News->source_id)
                    ->type('author', $News->author)
                    ->select('status', $News->status)
                 //   ->type('image', $News->image)
                    ->type('description', $News->description)
                    ->press('Сохранить')
                    ->assertPathIs('/admin/news');
        });
    }
    public function testUpdateForm(): void
    {
        $News = News::factory()->create();

        $this->browse(static function (Browser $browser) use($News) {
            $browser->visit('/admin/news/1/edit')
                    ->type('title', $News->title)
                    ->select('category_id', $News->category_id)
                    ->select('source_id', $News->source_id)
                    ->type('author', $News->author)
                    ->select('status', $News->status)
                  //  ->type('image', $News->image)
                    ->type('description', $News->description)
                    ->press('Сохранить')
                    ->assertPathIs('/admin/news');
        });
    }
}