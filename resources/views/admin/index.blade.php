<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Admin Dashboard | Carwash</title>

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

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      {{-- TITLE --}}
      <div class="title ms-5 pt-5">
        <h1>Selamat Datang Di Halaman Dashboard Sistem Carwash</h1>
      </div>

      {{-- BAGIAN CARD JUMLAH USER DAN TRANSAKSI --}}
      <div class="bagian-card mx-5 pt-5 text-center">
        <div class="row">
          <div class="col">
            <h3>Jumlah Data User</h3>
            <div class="card">
              <div class="card-body">
                <h3>{{ $user }}</h3>
                <h3>User</h3>
              </div>
            </div>
          </div>
          <div class="col">
            <h3>Jumlah Data Transaksi</h3>
            <div class="card">
              <div class="card-body">
                <h3>{{ $transaction }}</h3>
                <h3>Transaksi</h3>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>
  </div>
</div>


    <script src="/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="/js/dashboard.js"></script>
  </body>
</html>
