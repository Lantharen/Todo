<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('pages.list', [
            'todos' => Todo::paginate(),
        ]);
    }

    public function create()
    {
        return view('pages.form');
    }

    public function store(CreateUpdateTodoRequest $request)
    {
        Todo::create($request->validated());

        return redirect()->route('todo.list');
    }
}
