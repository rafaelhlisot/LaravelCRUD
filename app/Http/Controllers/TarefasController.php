<?php

namespace App\Http\Controllers;

use App\http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    public function list() {
        $list = DB::select('SELECT * FROM tarefas');

        return view('tarefas.list', [
            'list' => $list
        ]);
    }

    public function add() {
        return view('tarefas.add');
    }

    public function addAction(Request $request) {
        $request->validate([
            'title' => [
                'required',
                'string'
            ]
        ]);

        $title = $request->input('title');

        DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', ['titulo' => $title]);

        return redirect()->route('tarefas.list');
    }

    public function edit($id) {
        $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
            'id' => $id
        ]);

        if(count($data) > 0) {
            return view('tarefas.edit', [
                'data' => $data[0]
            ]);
        } else {
            return redirect()->route('tarefas.list');
        }

    }

    public function editAction(Request $request, $id) {
        $request->validate([
            'title' => [
                'required',
                'string'
            ]
        ]);

        $titulo = $request->input('title');

        DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
            'id' => $id,
            'titulo' => $titulo
        ]);


        return redirect()->route('tarefas.list');
    }

    public function del($id) {
        DB::delete('DELETE FROM tarefas WHERE id = :id', [
            'id' => $id
        ]);

        return redirect()->route('tarefas.list');
    }

    public function done($id) {
        DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
            'id' => $id
        ]);

        return redirect()->route('tarefas.list');
    }
}
