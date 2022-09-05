<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sources\CreateRequest;
use App\Http\Requests\Sources\EditRequest;
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
    public function store(CreateRequest $request)
    {

        $source = new Source(
            $request->validated()
        );

        if($source->save()) {
            return redirect()->route('admin.source.index')
                ->with('success', __('messages.admin.sources.create.success'));
        }

        return back()->with('error', __('messages.admin.sources.create.fail'));

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
    public function update(EditRequest $request, Source $source)
    {
        $source->update($request->validated());

        if($source->save()) {
            return redirect()->route('admin.source.index')
                ->with('success', __('messages.admin.sources.update.success'));

        }

        return back()->with('error', __('messages.admin.sources.update.fail'));
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
                ->with('success', __('messages.admin.sources.destroy.success'));
        }
        else{
            return redirect()->route('admin.source.index')
                ->with('error', __('messages.admin.sources.destroy.fail'));
        }
    }
}
