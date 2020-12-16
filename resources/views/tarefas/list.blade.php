@extends('layouts.admin')

@section('title', 'Listagem de tarefas')

@section('content')
    <h1>Listagem</h1>

    <a href="">Adicionar nova tarefa</a>

    @if(count($list) > 0)
        <ul>
            @foreach($list as $item)
                <li>
                    <a href="">[ @if($item->resolvido === 1) DESMARCAR @else MARCAR @endif]</a>
                    {{$item->titulo}}
                    <a href="">[ EDITAR ]</a>
                    <a href="">[ EXCLUIR ]</a>
                </li>
            @endforeach
        </ul>
    @else
        Não há tarefas a realizar.
    @endif
@endsection
