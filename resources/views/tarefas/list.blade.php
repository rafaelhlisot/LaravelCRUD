@extends('layouts.admin')

@section('title', 'Listagem de tarefas')

@section('content')
    <h1>Listagem</h1>

    <a href="{{route('tarefas.add')}}">Adicionar nova tarefa</a>

    @if(count($list) > 0)
        <ul>
            @foreach($list as $item)
                <li>
                    <a href="{{route('tarefas.done', ['id'=>$item->id])}}">[ @if($item->resolvido === 1) DESMARCAR @else MARCAR @endif]</a>
                    {{$item->titulo}}
                    <a href="{{route('tarefas.edit', ['id'=>$item->id])}}">[ EDITAR ]</a>
                    <a href="{{route('tarefas.del', ['id'=>$item->id])}}" onclick="return confirm('Deseja realmemte excluir este registro?')">[ EXCLUIR ]</a>
                </li>
            @endforeach
        </ul>
    @else
        Não há tarefas a realizar.
    @endif
@endsection
