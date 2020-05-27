<!DOCTYPE html>
<html>
<head>
	<title>blog</title>
</head>
<body>
<table style="width: 100%">
@foreach($participant as $key => $data)

	<tr>
		<th>{{ $data -> id}}</th>
		<th>{{ $data -> email}}</th>
		<th>{{ $data -> name}}</th>
	</tr>
@endforeach
</table>
<button>Create A new User</button>
</body>
</html>
