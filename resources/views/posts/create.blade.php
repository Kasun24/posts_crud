@extends('layouts.app') 
@section('title', 'Add Post')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Post
                </div>
                <div class="float-end">
                    <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm"><i class="bi bi-caret-left-fill"></i> Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="title" class="col-md-4 col-form-label text-md-end text-start">Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="body" class="col-md-4 col-form-label text-md-end text-start">Body</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="5">{{ old('body') }}</textarea>
                            @error('body')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="published_date" class="col-md-4 col-form-label text-md-end text-start">Published Date</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('published_date') is-invalid @enderror" id="published_date" name="published_date" value="{{ old('published_date') }}">
                            @error('published_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start">Status</label>
                        <div class="col-md-6">
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="published">Published</option>
                                <option value="unpublished">Unpublished</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-4 offset-md-4 btn btn-primary" value="Add Post">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection