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
        if ($request->filled('title')) {
            $title = $request->input('title');

            DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', ['titulo' => $title]);

            return redirect()->route('tarefas.list');
        } else {
            return redirect()->route('tarefas.add')->with('warning', 'Preencha o titulo');
        }
    }

    public function edit() {
        return view('tarefas.edit');
    }

    public function editAction() {

    }

    public function del() {

    }

    public function done() {

    }
}
