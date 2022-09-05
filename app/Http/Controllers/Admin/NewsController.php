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
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;

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
			'newsList' => $builder->getAllNews()
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
        CreateRequest $request,
        NewsQueryBuilder $builder
    ): RedirectResponse {

        $news = $builder->create(
            $request->validated()
        );
        
        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.create.success'));
        }

        return back()->with('error', __('messages.admin.news.create.fail'));
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
        EditRequest  $request,
        News $news,
        NewsQueryBuilder $builder
    ): RedirectResponse {
        if($builder->update($news, $request->only(['category_id', 'source_id',
            'title', 'author', 'status', 'image', 'description']))) {

            return redirect()->route('admin.news.index')
                    ->with('success', __('messages.admin.news.update.success'));

        }

        return back()->with('error', __('messages.admin.news.update.fail'));
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
                ->with('success', __('messages.admin.news.destroy.success'));
        }
        else{
            return redirect()->route('admin.news.index')
                ->with('error', __('messages.admin.news.destroy.fail'));
        }
    }
}
