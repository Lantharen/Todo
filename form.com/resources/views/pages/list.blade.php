@extends('layouts.base')
@section('page.title', 'Todo List')
@section('page.content')
    <div class="container">
        <div class="row">
            <div class="col">

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
                            <td>{{ $todo->status }}</td>
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
