@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h3 class="display-4">Add a post</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('posts.store') }}">
          @csrf
          
          <div class="form-group">    
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title"/>
          </div>

          <div class="form-group">
              <label for="content">Content:</label>
              <textarea class="form-control" name="content" rows="5"></textarea>
          </div>                       
          <button type="submit" class="btn btn-primary">Publish</button>
      </form>
  </div>
</div>
</div>
@endsection