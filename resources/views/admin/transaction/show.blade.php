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

        {{-- TITLE --}}
      <div class="title pt-5">
        <h1>Halaman Kelola Data Transaksi</h1>
      </div>

      {{-- BAGIAN TABLE --}}
      <div class="card mt-4">
          <div class="card-body">
              <table id="transaksi" class="table-striped">
                <thead>
                    <tr>
                        <th>No. Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>ID User</th>
                        <th>ID Paket Cuci</th>
                        <th>Total Harga</th>
                        <th>Pembayaran</th>
                        <th>Kembalian</th>
                        <th>Nama Paket Tambahan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->notransaksi }}</td>
                            <td>{{ $data->tgltransaksi }}</td>
                            <td>{{ $data->iduser }}</td>
                            <td>{{ $data->idpaketcuci }}</td>
                            <td>Rp.{{ $data->totalharga }}.000</td>
                            <td>Rp.{{ number_format($data->pembayaran, 0, ',', '.') }}</td>
                            <td>Rp.{{ $data->kembalian }}.000</td>
                            <td>{{ $data->namapakettambahan }}</td>
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
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#transaksi').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        } );
    </script>
    
  </body>
</html>
