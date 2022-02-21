<?php

namespace App\Http\Controllers;

use App\Models\Empleo;
use Illuminate\Http\Request;

class EmpleoController extends Controller
{

    public function index()
    {
        $empleos  = Empleo::where('status',2)->latest('id')->paginate(8);

        return view('empleos.index',compact('empleos'));
    }

    public function show(Empleo $empleo){
        $similares = Empleo::where('category_id',$empleo->category_id)
                            ->where('status', 2)
                            ->where('id', '!=', $empleo->id)
                            ->latest('id')
                            ->limit(4)
                            ->get();
        return view('empleos.show',compact('empleo', 'similares'));
    }

}
