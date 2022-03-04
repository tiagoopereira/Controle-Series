@extends('layout')

@section('header')
    Séries
@endsection

@auth
    @section('action-button')
        <a href="{{ route('series.create') }}" class="btn btn-dark">Adicionar</a>
    @endsection
@endauth

@section('content')
    @if (!empty($message))
        <div class="alert alert-success">{{ $message }}</div>
    @endif
    
    @if (!count($series))
        <div class="series-empty">Adicione uma série para visualizá-la aqui!</div>    
    @endif

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item align">
                <div class="align edit">
                    <span id="name-serie-{{ $serie->id }}">{{ $serie->name }}</span>
                    @auth
                        <div class="input-group edit" hidden id="input-name-serie-{{ $serie->id }}">
                            <input type="text" class="form-control edit" value="{{ $serie->name }}" />
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-sm check" onclick="editarSerie({{ $serie->id }})">
                                    <i class="fas fa-check"></i>
                                </button>
                                @csrf
                            </div>
                        </div>
                    @endauth
                </div>
                <div class="d-flex">
                    @auth
                        <button class="btn btn-warning btn-sm" onclick="toggleInput({{ $serie->id }})" style="margin-right: 5px;">
                            <i class="fas fa-edit"></i>
                        </button>
                    @endauth
                    <a href="{{ route('seasons.index', ['id' => $serie->id]) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    @auth
                        <form method="post" action="/series/{{ $serie->id }}" onsubmit="return confirm('Tem certeza que deseja excluir {{ $serie->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    @endauth
                </div>
            </li>
        @endforeach
    </ul>
    <script>
        function toggleInput(id) {
            const inputSerie = document.getElementById(`input-name-serie-${id}`);
            const nameSerie = document.getElementById(`name-serie-${id}`);

            if (!nameSerie.hasAttribute('hidden')) {
                inputSerie.removeAttribute('hidden');
                nameSerie.setAttribute('hidden', true);

                return;
            }

            inputSerie.setAttribute('hidden', true);
            nameSerie.removeAttribute('hidden');
        }

        function editarSerie(id) {
            let formData = new FormData();
            const name = document.querySelector(`#input-name-serie-${id} > input`).value;
            const token = document.querySelector(`#input-name-serie-${id} > div > input`).value;
            
            formData.append('name', name);
            formData.append('_token', token);

            const uri = `/series/${id}/edit`;

            fetch(uri, {
                method: 'POST',
                body: formData 
            })
            .then(response => {
                if (response.ok) {
                    document.getElementById(`name-serie-${id}`).innerText = name;
                    toggleInput(id);
                }
            })
        }
    </script>
@endsection