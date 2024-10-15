@extends('layout.principal')
@section('conteudo')
        <div class="container">
            <h1>Detalhes do produto: {{$product->nome}}</h1>

        <ul>
            <li>
                <b>Valor: </b> R$ {{$product->preco}}
            </li>
            <li>
                <b>Descrição: </b> {{$product->descricao ?? 'Nenhuma descrição informada'}}
            </li>
        </ul>

        </div>
@stop
