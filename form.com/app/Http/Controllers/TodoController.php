<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateTodoRequest;
use App\Http\Requests\ToggleTodoRequest;
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

    public function toggleStatus(ToggleTodoRequest $request)
    {
        $todo = Todo::query()->findOrFail(
            $request->input('id')
        );

        $todo->update([
            'status' => $request->input('status')
        ]);

        return redirect()->back();
    }

    public function edit(int $id)
    {
        $todo = Todo::query()->findOrFail($id);

        return view('pages.form', [
            'todo' => $todo
        ]);
    }

    public function update(CreateUpdateTodoRequest $request)
    {
        $todo = Todo::query()->findOrFail(
            $request->input('id')
        );

//        $todo->update([
//            'title' => $request->input('title'),
//            'content' => $request->input('content')
//        ]);

        $todo->update($request->only('title', 'content'));

        return redirect()->route('todo.list');
    }

    public function delete(int $id)
    {
        Todo::query()->findOrFail($id)?->delete();

        return redirect()->back()->with('message', 'Удалено!');
    }
}
