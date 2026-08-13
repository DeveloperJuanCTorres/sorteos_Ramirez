<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Company;
use App\Models\Raffle;
use App\Models\Winner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $empresa = Company::first();
        // $sorteo = Raffle::where('active', 1)->first();
        // $premios = Award::where('raffle_id', $sorteo->id)->get();

        // 📌 Todos los sorteos activos
        $sorteos = Raffle::where('active', 1)
            ->orderBy('date', 'asc')
            ->get();

        // 🎯 El más próximo
        $sorteo = $sorteos->first();

        // 🏆 Premios del más próximo
        $premios = $sorteo 
            ? Award::where('raffle_id', $sorteo->id)->get()
            : collect();

        $winners = Winner::with(['raffle', 'award', 'tickets'])->latest()->get();

        return view('home', compact('sorteos', 'sorteo', 'premios', 'empresa', 'winners'));
    }

    public function tickets()
    {
        $empresa = Company::first();
        return view('tickets', compact('empresa'));
    }

    public function ganadores()
    {
        $empresa = Company::first();
        $sorteos = Raffle::where('active', 1)
            ->orderBy('date', 'asc')
            ->get();

        $winners = Winner::with(['raffle', 'award', 'tickets'])->latest()->get();
        
        return view('ganadores', compact('empresa', 'sorteos', 'winners'));
    }

    public function terminos()
    {
        $empresa = Company::first();
        return view('terminos', compact('empresa'));
    }
}
