  <!-- BAGIAN NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active px-5" aria-current="page" href="/">Home</a>
                    <a class="nav-link" href="/list-transaction">Transaksi</a>
                    <a class="nav-link" href="/profile">Profil</a>
                </div>
                <div class="navbar-nav">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="nav-link bg-dark border-none" type="submit">Logout</button>
                    </form>
                </div>
                </div>
            </div>
        </nav>