<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Modo;
use App\Models\Suscripcion;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $modos = Modo::all();
        return view('suscripciones.index', compact('categories', 'modos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('suscripciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $suscripcion = Suscripcion::create($request->all());

        // return $suscripcion->all();
        
        return redirect()->route('suscripciones.store')->with('info', 'La suscripción se realizó con éxito');

/////////////////////////////////////////////////////////////

        // $request->validate([
        //     'name' => 'required',
        //     'slug' => 'required|unique:modos',
        //     'color' => 'required',
        // ]);

        
        $modo = Modo::create($request->all());
        
        
        
        return redirect()->route('admin.modos.edit', $modo)->with('info', 'La modalidad se creó con éxito');





/////////////////////////////////////////////////////////////
    // $empleo = Empleo::create($request->all());
    
        // if ($request->file('file')) {
        //     $url = Storage::put('empleos', $request->file('file'));

        //     $empleo->image()->create([
        //         'url' => $url
        //     ]);
        // }
        
        // if ($request->modos) {
        //     $empleo->modos()->attach($request->modos);
        // }

        // event(new EmpleoEvent($empleo));

        // return redirect()->route('admin.empleos.edit', $empleo)->with('info', 'Empleo creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Suscripcion $suscripcion)
    {
        // return view('suscripciones.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Suscripcion $suscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suscripcion $suscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suscripcion $suscripcion)
    {
        //
    }

}
