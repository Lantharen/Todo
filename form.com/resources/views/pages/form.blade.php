@extends('layouts.base')
@section('page.title', 'Add Todo')
@section('page.content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">

                <form action="{{ isset($todo) ? route('todo.update') : route('todo.store') }}" method="post">
                    @csrf

                    @isset($todo)
                        <input type="hidden" name="id" value="{{ $todo->id }}">
                    @endisset

                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title"
                               class="form-control" required="required"
                               value="{{ isset($todo) ? $todo->title : '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" rows="3" class="form-control">{{ isset($todo) ? $todo->content : '' }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        @isset($todo)
                            Update
                        @else
                            Create
                        @endisset
                    </button>

                    @isset($todo)
                        @include('pages.includes.status-toggler', [
                            'id' => $todo->id,
                            'status' => $todo->status
                        ])
                    @endisset
                </form>

            </div>
        </div>
    </div>
@endsection
