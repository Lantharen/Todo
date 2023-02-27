@extends('layouts.base')
@section('page.title', 'Todo List')
@section('page.content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="display-4">Todo List</h1>
                    <a href="{{ route('todo.create') }}" class="btn btn-sm btn-primary">Create</a>
                </div>

                <table class="table">

                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($todos as $todo)
                        <tr>
                            <th scope="row">{{ $todo->title }}</th>
                            <td>{{ $todo->content }}</td>
                            <td>
                                @include('pages.includes.status-indicator', [
                                    'status' => $todo->status
                                ])
                            </td>
                            <td>
                                @include('pages.includes.status-toggler', [
                                    'id' => $todo->id,
                                    'status' => $todo->status
                                ])
                                <a href="{{ route('todo.edit', ['id' => $todo->id]) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                {{ $todos->links() }}
            </div>
        </div>
    </div>
@endsection
