<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use Illuminate\Http\Request;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsQueryBuilder $builder)
    {
        return view('admin.news.index', [
			'newsList' => $builder->getNews()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sources = Source::all();
		return view('admin.news.create', [
            'categories' => $categories,
            'sources' => $sources,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        NewsQueryBuilder $builder
    ): RedirectResponse {

        $news = $builder->create(
            $request->only(['category_id', 'source_id',
                'title', 'author', 'status', 'image', 'description'])
        );
        
        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $sources = Source::all();
		return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'sources' => $sources,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        News $news,
        NewsQueryBuilder $builder
    ): RedirectResponse {
        if($builder->update($news, $request->only(['category_id', 'source_id',
            'title', 'author', 'status', 'image', 'description']))) {

            return redirect()->route('admin.news.index')
                    ->with('success', 'Запись успешно обновлена');

        }

        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if($news->delete()){
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись удалена');
        }
        else{
            return redirect()->route('admin.news.index')
                ->with('error', 'Ошибка удаления');
        }
    }
}
