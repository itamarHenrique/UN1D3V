@extends('layout.principal')
@section('conteudo')


<h1 class="titulo">Novo produto</h1>

<form action="/api/products/adiciona" method="POST">

    <div class="form-group">
        <label>Nome</label>
        <input class="form-control" id="nome" name="nome">
    </div>

    <div class="form-group">
        <label>Descrição</label>
        <input class="form-control" id="descricao" name="descricao">
    </div>
    <div class="form-group">
        <label>Preço</label>
        <input class="form-control" id="preco" name="preco">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Adicionar</button>


</form>

@stop


