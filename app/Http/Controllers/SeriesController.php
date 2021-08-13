<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Services\CreateSerieService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SerieFormRequest;
use App\Services\DeleteSerieService;

class SeriesController extends Controller
{
    public function index(Request $request): View
    {
        $series = Serie::orderBy('name')->get();
        $message = $request->session()->get('message');

        return view('series.index', compact('series', 'message'));
    }

    public function create(): View
    {
        return view('series.create');
    }

    public function store(SerieFormRequest $request, CreateSerieService $createSerieService): RedirectResponse
    {   
        $serie = $createSerieService->create($request->name, $request->seasons_amount, $request->episodes_amount);

        $request->session()->flash('mensagem', "A série {$serie->name} foi adicionada com sucesso!");

        return redirect(route('series.index'));
    }

    public function destroy(Request $request, DeleteSerieService $deleteSerieService): RedirectResponse
    {
        $deleteSerieService->delete($request->id);
        $request->session()->flash('message', "Série removida com sucesso!");

       return redirect(route('series.index'));
    }
}