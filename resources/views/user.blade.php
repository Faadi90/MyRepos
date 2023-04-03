<x-header componentName="User"/>

<h1>User page.</h1>

{{-- {{ URL::current(); }} --}}



<h1>Api Data Fetched Via Http:</h1>
<table border="1">

	<tbody>
		<tr>
			<td>ID</td>
			<td>Email</td>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Profile Photo</td>
		</tr>


@foreach($collectionAPI as $user)

		<tr>
			<td>{{ $user['id'] }}</td>
			<td>{{ $user['email'] }}</td>
			<td>{{ $user['first_name'] }}</td>
			<td>{{ $user['last_name'] }}</td>
			<td><img src="{{ $user['avatar'] }}" alt=""></td>
		</tr>

@endforeach

	</tbody>
</table>

