<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('admin.category.index', [
			'categoryList' => app(Category::class)->getCategories()
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
    public function store(Request $request)
    {
/*        $request->validate([
			'caption' => ['required', 'string', 'min:5', 'max:255']
		]);

        $categories = app(Category::class)->getCategories();
        if($request->get('category') !== null)
            $categoryId = intval($request->get('category'));
        else
        {
            $categoryId = array_key_last($categories)+1;
            $categories[$categoryId] = ['id' => $categoryId];
        }
        
        $categories[$categoryId]['caption'] = $request->get('caption');
        $categories[$categoryId]['description'] = $request->get('description');

        file_put_contents(storage_path($this->categoriesFile), json_encode($categories));

		return response()->redirectToRoute('admin.category.index');*/
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
    public function edit($id)
    {
 /*       $categoryId = intval($id);
        $category = $this->getCategories()[$categoryId];
        return view('admin.category.edit', [
            'categoryId' => $categoryId,
            'category' => $category
        ]);*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
/*        $categories = $this->getCategories();

        unset($categories[intval($id)]);
        file_put_contents(storage_path($this->categoriesFile), json_encode($categories));

		return response()->redirectToRoute('admin.category.index');*/
    }
}
