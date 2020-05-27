@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div>
    <a style="margin: 19px;" href="{{ route('blogs.create')}}" class="btn btn-primary">New blog</a>
    </div> 
<div class="col-sm-12">
    <h1 class="display-3">Blogs</h1>    
	  <table class="table table-striped">
	    <thead>
	        <tr>
	          <td>ID</td>
	          <td>Name</td>
	          <td>Email</td>
	          <td>City</td>
	          <td>Content</td>
	          
	          <td colspan = 2>Actions</td>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach($blogs as $blog)
	        <tr>
	            <td>{{$blog->id}}</td>
	            <td>{{$blog->first_name}} {{$blog->last_name}}</td>
	            <td>{{$blog->email}}</td>
	            <td>{{$blog->city}}</td>
	            <td>{{$blog->content}}</td>
	            <td>
	                <a href="{{ route('blogs.edit',$blog->id)}}" class="btn btn-primary">Edit</a>
	            </td>
	            <td>
	                <form action="{{ route('blogs.destroy', $blog->id)}}" method="post">
	                  @csrf
	                  @method('DELETE')
	                  <button class="btn btn-danger" type="submit">Delete</button>
	                </form>
	            </td>
	        </tr>
	        @endforeach
	    </tbody>
	  </table>
	  {{ $blogs->links() }}
<div>
</div>
@endsection