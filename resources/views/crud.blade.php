<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>CRUD</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<script src="https://kit.fontawesome.com/3c7b207f0f.js" crossorigin="anonymous"></script>

<style type="text/css">
  .w-5{
    display:none
  }
</style>

</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">CRUD</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container mt-5">
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h1 class="my-4">CRUD
          <small>OPERATION:</small>
        </h1>
        <!-- Blog Post -->
        <div class="card mb-4">
          <div class="card-body">

            <div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
                <a href="" class="btn btn-outline-primary" title=""><i class="far fa-add"></i>Add</a>
              <table class="table table-striped|table-dark|table-bordered|table-borderless|table-hover|table-sm">
                <caption>List of users</caption>
                <thead class="thead-dark|thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach($data as $value)
                  <tr>
                    <th scope="row">{{ $value['id'] }}</th>
                    <td>{{ $value['name'] }}</td>
                    <td>{{ $value['detail'] }}</td>
                    <td>{{ $value['image'] }}</td>
                    <td>
                      <a href="{{ URL::to('crudedit/'.$value['id']) }}" title="Edit"><i class="far fa-edit"></i></a>
                      <a href="{{ URL::to('delete/'.$value['id'])}}" title="Delete" onclick="return confirm('Are you sure you want to delete?')"><i class="far fa-trash-alt"></i></a>


                    </td>
                  </tr>
                  @endforeach
                                    
                </tbody>
              </table>

            </div>

          </div>
          <div class="card-footer text-muted">
            {{-- {{ $data->render() }} --}}
            {{ $data->links() }}
          </div>
        </div>


    <div class="card mb-4">
          <div class="card-body">
            <h2>Add your data:</h2>
            <div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
 
                <form action="{{ URL::to('add') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                    
                    <div class="col">
                      <input type="text" name="name" class="form-control" placeholder="First name" required value="{{ old('name') }}">
                    </div>

                    <div class="col">
                      <textarea name="detail" class="form-control" placeholder="Detail"></textarea>
                    </div>

                    <div class="col">
                      <input type="text" name="image" class="form-control" placeholder="Image">
                    </div>

                    <div class="col">
                      <input type="submit" class="form-control btn btn-outline-primary" placeholder="Submit">
                    </div>

                  </div>

                        @if(Session::has('crud'))
                          <h4>{{ session::get('crud') }}</h4>
                        @elseif(session('update'))
                          <h4>{{ session::get('update') }}</h4>
                        @elseif(session('delete'))
                          <h4>{{ session::get('delete') }}</h4>
                        @endif


                </form>


            </div>

          </div>
          <div class="card-footer text-muted">
          </div>
        </div>

        <!-- Blog Post -->
        
        <!-- Blog Post -->
        
        <!-- Pagination -->
        
      </div>
      <!-- Sidebar Widgets Column -->
      
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
  <!-- Footer -->


  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>
  <!-- Bootstrap core JavaScript -->

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>