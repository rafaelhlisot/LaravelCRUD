@extends('layouts.admin')

@section('title', 'Adição de tarefas')

@section('content')
    <h1>Adição</h1>

    @if ($errors->any())
        <x-alert>
            @foreach ($errors->all() as $error)
                {{$error}}<br/>
            @endforeach
        </x-alert>
    @endif

    <form method="POST">
        @csrf
        <label>
            Titulo<br/>
            <input type="text" name="title" />
        </label>

        <input type="submit" value="Adicionar" />
    </form>
@endsection
