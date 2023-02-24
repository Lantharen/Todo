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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($todos as $todo)
                        <tr>
                            <th scope="row">{{ $todo->title }}</th>
                            <td>{{ $todo->content }}</td>
                            <td>
                                @if($todo->status)
                                    <span class="badge text-bg-success">Done</span>
                                @else
                                    <span class="badge text-bg-warning">Pending</span>
                                @endif
                            </td>
                            <td>@mdo</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                {{ $todos->links() }}
            </div>
        </div>
    </div>
@endsection
