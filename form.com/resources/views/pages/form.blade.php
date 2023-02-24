@extends('layouts.base')
@section('page.title', 'Add Todo')
@section('page.content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <form action="{{ route('todo.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" rows="3" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
