<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>QueryBuilder</title>
	<link rel="stylesheet" href="">
</head>
<body>
	
	<table border="1">
			@foreach($data as $value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->name }}</td>
				<td>{{ $value->detail }}</td>
				<td>{{ $value->image }}</td>
			</tr>
			@endforeach

	</table>

<script type="text/javascript">
		
		var data = @json($data);
		console.log(data[0]['name']);

</script>

</body>
</html>