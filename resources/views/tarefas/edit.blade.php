@extends('layouts.admin')

@section('title', 'Edição de tarefas')

@section('content')
    <h1>Edição</h1>

    @if (session('warning'))
        <x-alert> {{session('warning')}} </x-alert>
    @endif

    <form method="POST">
        @csrf
        <label>
            Titulo<br/>
            <input type="text" name="title" value="{{$data->titulo}}"/>
        </label>

        <input type="submit" value="Salvar" />
    </form>
@endsection
