@extends('layout')

@section('header')
    Adicionar Série
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li style="list-style: none;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="col col-2">
                <label for="seasons_amount">Nº Temporadas</label>
                <input type="number" id="seasons_amount" name="seasons_amount" class="form-control" />
            </div>
            <div class="col col-2">
                <label for="episodes_amount">Eps por Temporada</label>
                <input type="number" id="episodes_amount" name="episodes_amount" class="form-control" />
            </div>
        </div>
        <button class="btn btn-dark">Adicionar</button>
        <a href="{{ route('series.index') }}" class="btn btn-light">Cancelar</a>
    </form>
@endsection   