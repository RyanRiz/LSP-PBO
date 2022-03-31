<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Admin Dashboard | Carwash</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>
  <body>

<div class="container-fluid">
  <div class="row">
    
    @include('admin.partials.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ms-5">

      {{-- TABLE --}}
      <div class="title pt-5">
        <h1>Halaman Kelola Data User</h1>
      </div>

      {{-- BUTTON TAMBAH USER --}}
      <div class="tombol pt-3">
        <a class="btn btn-primary" href="{{ route('admin.user.add') }}" role="button">Tambah User</a>
      </div>

      {{-- BAGIAN CARD --}}
      <div class="card mt-4">
          <div class="card-body">
              <table id="user" class="table-striped">
                <thead>
                    <tr>
                        <th>ID User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->password }}</td>
                        <td>
                            <div class="tombol d-flex">
                                <div class="satu pe-2">
                                    <a class="btn btn-success" href="{{ route('user.show', $user->id) }}" role="button">Edit</a>
                                </div>
                                <div class="dua">
                                  <form action="{{ route('user.delete', $user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                  </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
          </div>
      </div>

    </main>
  </div>
</div>


    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>
    <script>
        $(document).ready(function() {
            $('#user').DataTable();
        } );
    </script>
  </body>
</html>
