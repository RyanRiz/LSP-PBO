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

          <div class="title mt-5">
              <div class="pt-3">
                  <h1 class="text-center">Halaman Profile</h1>
              </div>
          </div>
      
          <div class="box pt-3">
              <div class="card col-md-5 mx-auto">
                  <div class="card-body">
                      <?php if(isset($msg)) :?>
                        <?= $msg ?>
                        <?php endif ?>
                        <div class="tampil text-center my-5">
                            <h2>Halo, <?= $nama ?></h2>
                        </div>
                        <div class="col-12 pt-4">
                            <div class="row">
                                <div class="col">
                                    <div class="d-grid gap-2">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-grid gap-2">
                                        <a class="btn btn-primary" href="edit-profil.php?id=<?= $id ?>" role="button">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
              </div>
          </div>

          @include('partials.footer')
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>