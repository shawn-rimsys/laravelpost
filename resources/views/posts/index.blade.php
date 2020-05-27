@extends('base')
@section('main')
<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>

<div class="row">
<div class="col-sm-12">
    <h1 class="display-4">Posts</h1>
    <div>
    	<a style="margin: 19px;" href="{{ route('posts.create')}}" class="btn btn-primary">New post</a>
    </div>

  <table class="table table-striped">
    <thead>
        <tr>
          <td>Author</td>
          <td>Title</td>
          <td>Content</td>
          <td>Created Time</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->author_id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->created_at}}</td>
            <td>
                <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $posts->links() }}
<div>
</div>
@endsection
