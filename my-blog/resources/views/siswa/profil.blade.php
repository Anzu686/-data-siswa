<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5 pt-3 pb-5 justify-content-center">
      
        <div class="row">
            <div class="col-12 justify-content-center">
               
                <div class="card shadow rounded-1">
                    <div class="card-body">

                        <div class="card w-100" >
                            <img src="{{ asset('storage/'.$siswa->image) }}" class="card-img-top" >


                            <div class="card-body">
                                <h3>
                                  {{ $siswa->name }}
                                  <small class="text-muted">{{ $siswa->nis }}</small>
                                </h3>
                              
                             
                              <p class="card-text">{{ $siswa->jk }}</p>
                            </div>
                          </div>
                          <div class="justify-content-end d-flex"><a href="{{ route('siswa.index')  }}" class="btn btn-warning text-white mt-2"> Kembali</a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>