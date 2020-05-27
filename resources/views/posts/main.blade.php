@extends('base')
@section('main')
<div class="col-sm-12">
	<div>
    	<a style="margin: 19px;" href="{{ url('posts/addpost')}}" class="btn btn-primary">New post</a>
    </div>
	@foreach($posts as $post)
		<div class="advertise">
			<div class="section">
				<div class="container">
					<div class="row">
						<h2 class="caption-left">{{ $post->title }}</h2>
					</div>
					<div class="row">
						<div class="col">
							<p class="text">Posted by: {{ $post->author_id }}</p>
						</div>
						<div class="col">
							<p class="text">Posted at: {{ $post->created_at }}</p>
						</div>
					</div>
					<div class="row">
						<p class="text" style="font-size: 1.45em">{{ $post->content }}</p>
					</div>
				</div>				
			</div>
		</div>
		<br/>		
	@endforeach
	{{ $posts->links() }}
</div>
@endsection