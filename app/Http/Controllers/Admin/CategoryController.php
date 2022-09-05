<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditRequest;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $categories = Category::select(Category::$selectedFields)->get();
        return view('admin.category.index', [
			'categoryList' => $categories
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $category = new Category(
            $request->validated()
        );

        if($category->save()) {
            return redirect()->route('admin.category.index')
                ->with('success', __('messages.admin.categories.create.success'));
        }

        return back()->with('error', __('messages.admin.categories.create.fail'));
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
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Category $category): RedirectResponse
    {
        $category = $category->fill($request->validated());

        if($category->save()) {
            return redirect()->route('admin.category.index')
                    ->with('success', __('messages.admin.categories.update.success'));

        }

        return back()->with('error', __('messages.admin.categories.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            return redirect()->route('admin.category.index')
                ->with('success', __('messages.admin.categories.destroy.success'));
        }
        else{
            return redirect()->route('admin.category.index')
                ->with('error', __('messages.admin.categories.destroy.fail'));
        }
    }
}
