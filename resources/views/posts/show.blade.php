@extends('layouts.app')  
@section('title', 'Show Post')
@section('content')

<div class="row justify-content-center mt-3">
  <div class="col-md-8">

    <div class="card">
      <div class="card-header">
        <div class="float-start">
          Post Details
        </div>
        <div class="float-end">
          <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm"><i class="bi bi-caret-left-fill"></i> Back</a>
        </div>
      </div>
      <div class="card-body">

        <div class="row">
          <label for="title" class="col-md-4 col-form-label text-md-end text-start"><strong>Title:</strong></label>
          <div class="col-md-6" style="line-height: 35px;">
            {{ $post->title }}
          </div>
        </div>

        <div class="row">
          <label for="body" class="col-md-4 col-form-label text-md-end text-start"><strong>Body:</strong></label>
          <div class="col-md-6" style="line-height: 35px;">
            {{ $post->body }}
          </div>
        </div>

        <div class="row">
          <label for="published_date" class="col-md-4 col-form-label text-md-end text-start"><strong>Published Date:</strong></label>
          <div class="col-md-6" style="line-height: 35px;">
            {{ $post->published_date }}
          </div>
        </div>

        <div class="row">
          <label for="status" class="col-md-4 col-form-label text-md-end text-start"><strong>Status:</strong></label>
          <div class="col-md-6" style="line-height: 35px;">
            {{ ucfirst($post->status) }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
