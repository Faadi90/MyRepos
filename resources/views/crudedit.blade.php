<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Crud Edit</title>
  <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  
<div class="container">
  <!-- Content here -->
        <h1 class="my-4">UPDATE
          <small>DATA:</small>
        </h1>
  
  <form action="{{ URL::to('crudupdate') }}" method="POST">
  
    @csrf
    <input type="hidden" name="id" value={{ $data['id'] }}>

    <div class="form-row">

      <div class="col">
        <input type="text" class="form-control" placeholder="First name" name="name" value="{{old('name',$data['name']) }}">
      </div>
    
      <div class="col">
      <textarea name="detail" class="form-control" placeholder="Detail">{{ $data['detail']}}</textarea>
      </div>

      <div class="col">
        <input type="text" class="form-control" placeholder="Image" name="image" value="{{ $data['image'] }}">
      </div>

      <div class="col">
        <input type="submit" class="form-control btn btn-outline-primary" value="Update">
      </div>
    
    </div>

  </form>

</div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>