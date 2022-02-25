<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Empleo;
use App\Models\Modo;
use App\Http\Requests\StoreEmpleoRequest;
use Illuminate\Support\Facades\Storage;

class EmpleoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.empleos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::pluck('name', 'id');
        $modos = Modo::all();
        return view('admin.empleos.create', compact('categories', 'modos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmpleoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpleoRequest $request)
    {

       /*  return Storage::put('empleos', $request->file('file')); */

        $empleo = Empleo::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('empleos', $request->file('file'));

            $empleo->image()->create([
                'url' => $url
            ]);
        }
        
        if ($request->modos) {
            $empleo->modos()->attach($request->modos);
        }

        return redirect()->route('admin.empleos.edit', $empleo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleo  $empleo
     * @return \Illuminate\Http\Response
     */
    public function show(Empleo $empleo)
    {
        return view('admin.empleos.show', compact('empleo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleo  $empleo
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleo $empleo)
    {
        return view('admin.empleos.edit', compact('empleo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleo  $empleo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleo $empleo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleo  $empleo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleo $empleo)
    {
        //
    }
}
