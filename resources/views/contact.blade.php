<x-header componentName="Contact"/>

<h1>ContactUs Page.</h1>


@if(session('contact'))
<h3>The data is saved for {{ session('contact') }} </h3>
@endif
<form action="{{ URL::to("store") }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

@csrf
<input type="text" name="name"><br><br>
<textarea name="detail"></textarea><br><br>
<input type="file" name="file"><br><br>
<input type="submit" name="" value="Submit">

</form>

<br>

<h3>Form (to use session)</h3>
<form action="{{ URL::to('login') }}" method="POST" accept-charset="utf-8">
	@csrf
	<label>Name: <input type="user" name="user" value=""></label>
	<input type="submit" name="submit">

</form>
