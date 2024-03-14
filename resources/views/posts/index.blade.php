@extends('layouts.app')
@section('title', 'All Posts')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
  {{ $message }}
</div>
@endif

<div class="row justify-content-center mt-3">
  <div class="col-md-12">

    <div class="card">
      <div class="card-header">Post List</div>
      <div class="card-body">
        <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Post</a>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">S#</th>
              <th scope="col">Title</th>
              <th scope="col">Published Date</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if (isset($posts))
            @foreach ($posts as $post)
            <tr>
              <td>{{ $post->id }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->published_date }}</td>
              <td>{{ $post->status }}</td>
              <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                  <a class="btn btn-primary btn-sm" href="{{ route('posts.show',$post->id) }}"><i class="bi bi-eye"></i> Show</a>
                  <a class="btn btn-secondary btn-sm" href="{{ route('posts.edit',$post->id) }}"><i class="bi bi-pencil-square"></i> Edit</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this post?');"><i class="bi bi-trash"></i> Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>

        {{ $posts->links() }}
      </div>
    </div>
  </div>
</div>

@endsection