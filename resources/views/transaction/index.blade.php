<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <title>Transaction | Car Wash</title>
  </head>
  <body>

  <div class="container">
        
    @include('partials.navbar')
    
        <!-- BAGIAN INPUT TRANSAKASI -->
        <div class="card m-5 p-4">
            <form action="{{ route('transaction.store') }}" method="post">
                @csrf
                <input type="hidden" name="idpaketcuci" value="{{ $package->id }}">
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3 row">
                            <label for="input1" class="col-sm-2 col-form-label">No. Transaksi</label>
                            <div class="col">
                            <input type="text" class="form-control" name="notransaksi" id="input1">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input2" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                            <div class="col">
                            <input type="date" class="form-control" name="tgltransaksi" id="input2">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input3" class="col-sm-2 col-form-label">Nama Customer</label>
                            <div class="col">
                            <input type="text" class="form-control" name="username" value="{{ auth()->user()->username }}" id="input3" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input4" class="col-sm-2 col-form-label">Pilihan Paket</label>
                            <div class="col">
                            <input type="text" class="form-control" id="input4" value="{{ $package->namapaket }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input5" class="col-sm-2 col-form-label">Harga Paket</label>
                            <div class="col">
                            <input type="text" class="form-control" name="paket" id="input5" value="{{ number_format($package->harga, 0, ',', '.') }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pt-5">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tambahan" id="flexRadioDefault1" value="0" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Tidak ada Tambahan - Rp.0
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tambahan" id="flexRadioDefault2" value="10000">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Wax - Rp.10.000
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tambahan" id="flexRadioDefault3" value="20000">
                            <label class="form-check-label" for="flexRadioDefault3">
                                Fogging - Rp.20.000
                            </label>
                        </div>
                        <div class="col-auto pt-5">
                            <button type="button" onclick="totalHitung()" class="btn btn-primary">Hitung Total Bayar</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            
            
            <!-- BAGIAN INPUT PEMBAYARAN DAN KEMBALIAN -->
            <div class="row">
                <div class="col-6">
                    <div class="total px-5">
                        <div class="mb-3 row">
                        <label for="totalHarga" class="col-sm-2 col-form-label">Total Harga</label>
                        <div class="col">
                        <input type="text" class="form-control" name="totalharga" id="totalHarga" value="" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pembayaran" class="col-sm-2 col-form-label">Pembayaran</label>
                        <div class="col">
                        <input type="text" class="form-control" name="pembayaran" id="pembayaran" min="{{ $package->harga }}">
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <button class="btn btn-primary justify-content-end" onclick="kembalianHitung()" type="button">Hitung Kembalian</button>
                    </div>
                </div>
            </div>
            <div class="col-6 px-5">
                <div class="row">
                    <label for="kembalian" class="col-sm-2 col-form-label">Kembalian</label>
                    <div class="col">
                    <input type="text" class="form-control" id="kembalian" name="kembalian" readonly>
                    </div>
                </div>
                <button class="btn btn-primary btn btn-primary mt-5" type="submit">Simpan Transaksi</button>
            </form>
                <!-- MODAL KEMBALI KE HOME -->
                {{-- <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Simpan Transaksi
                </button> --}}
                
                <!-- MODAL -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content align-middle">
                            <div class="modal-body">
                                <h3 class="text-center fw-bold">
                                    Transaksi Berhasil <br>
                                    Kembali ke Home
                                </h3>
                                
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-primary" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('partials.footer')

    <script>
        // FUNCTION UNTUK MENGHITUNG JUMLAH HARGA
        function totalHitung() {
            var tambahan = parseInt(document.querySelector('input[name="tambahan"]:checked').value);
            var harga = parseInt({{ $package->harga }});
            var totalHarga = tambahan + harga;

            document.getElementById('totalHarga').value = totalHarga.toLocaleString();
            return totalHarga;
        }

        // FUNCTION UNTUK MENGHITUNG KEMBALIAN
        function kembalianHitung() {
            var total = totalHitung();
            var pembayaran = document.getElementById('pembayaran').value;
            var kembali = pembayaran - total;

            document.getElementById('kembalian').value = kembali.toLocaleString();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>