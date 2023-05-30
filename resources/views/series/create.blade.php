@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo')
    <form action="{{ route('series.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>

        <div class="form-group">
            <label for="qtd_temporadas">Numero de Temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
        </div>

        <div class="form-group">
            <label for="ep_por_temporada">Numero de Episodios</label>
            <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
        </div>

        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection
