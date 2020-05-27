@extends('base')
@section('main')
<table class="table table-bordered">
    <thead>
        <tr>
        	<th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
		        <tr>
		            <td>{{ $user->id }}</td>
		            <td>{{ $user->name }}</td>
		            <td><{{ $user->email }}</td>
		            <td><{{ $user->updated_at }}</td>
		            <td>
		                <button class="btn btn-danger">Delete</button>
		            </td>
		        </tr>
        @endforeach

    </tbody>
</table>
{{ $users->links() }}
@endsection