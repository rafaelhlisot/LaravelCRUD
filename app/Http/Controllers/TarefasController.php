<?php

namespace App\Http\Controllers;

use App\http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

    public function addAction() {

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
