<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <title>Home | Car Wash</title>
  </head>
  <body>

  <div class="container">
        
    @include('partials.navbar')

        <!-- BAGIAN BANNER -->
        <div class="jumbotron pt-4">
            <img src="img/banner.jpg" class="rounded-3" height="529">
        </div>

        <!-- BAGIAN DAFTAR -->
        <div class="daftar pt-3">
            <!-- BAGIAN TITLE DAFTAR -->
            <h2>Daftar Paket Pencucian Mobil</h2>

            <!-- BAGIAN ROW DAFTAR -->
            <div class="row pt-2">
                @foreach ($transactions as $transaction)
                <div class="col">
                    <div class="card py-3">
                        <div class="card-body">
                            <h3>{{ $transaction->namapaket }}</h3>
                            <p>{{ $transaction->deskripsi }}</p>
                            <div class="card-subtitle">Rp.{{ $transaction->harga }}</div>
                        </div>
                    </div>
                    <div class="pilih pt-4">
                        <a class="btn btn-primary d-grid" href="{{ route('transaction', $transaction->id) }}" role="button">Pilih Paket</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        @include('partials.footer')

</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>