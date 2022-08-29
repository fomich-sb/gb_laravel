<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Source;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sourceList = Source::select(Source::$selectedFields)->get();
        return view('admin.source.index', [
            'sourceList' => $sourceList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.source.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
			'url' => ['required', 'string', 'min:5', 'max:255']
		]);

        $source = new Source(
            $request->only(['url', 'creator_name', 'creator_contacts', 'comment'])
        );

        if($source->save()) {
            return redirect()->route('admin.source.index')
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
    public function edit(Source $source)
    {
        return view('admin.source.edit', [
            'source' => $source
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Source $source)
    {
        $source->update($request->only(['url', 'creator_name', 'creator_contacts', 'comment']));

        if($source->save()) {
            return redirect()->route('admin.source.index')
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
    public function destroy(Source $source)
    {
        if($source->delete()){
            return redirect()->route('admin.source.index')
                ->with('success', 'Запись удалена');
        }
        else{
            return redirect()->route('admin.source.index')
                ->with('error', 'Ошибка удаления');
        }
    }
}
