@extends('layout')

@section('header')
    Séries
@endsection

@section('add-button')
    <a href="{{ route('series.create') }}" class="btn btn-dark">Adicionar</a>
@endsection

@section('content')
    @if (!empty($mensagem))
        <div class="alert alert-success">{{ $mensagem }}</div>
    @endif
    
    @if (!count($series))
        <div class="series-empty">Adicione uma série para visualizá-la aqui!</div>    
    @endif

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item align">
                <span>{{ $serie->name }}</span>
                <form method="post" action="/series/{{ $serie->id }}" onsubmit="return confirm('Tem certeza que deseja excluir {{ $serie->name }}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm delete">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection