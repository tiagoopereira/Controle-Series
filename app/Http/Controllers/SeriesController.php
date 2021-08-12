<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerieFormRequest;
use App\Serie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request): View
    {
        $series = Serie::orderBy('name')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create(): View
    {
        return view('series.create');
    }

    public function store(SerieFormRequest $request): RedirectResponse
    {   
        $serie = Serie::create($request->all());
        $request->session()->flash('mensagem', "A série {$serie->name} foi adicionada com sucesso!");

        return redirect(route('series.index'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "Série removida com sucesso!");

       return redirect(route('series.index'));
    }
}