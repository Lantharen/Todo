<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateTodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::query()
            ->orderBy('created_at', 'desc')
            ->orderBy('status')
            ->paginate();

        return view('pages.list', [
            'todos' => $todos,
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
