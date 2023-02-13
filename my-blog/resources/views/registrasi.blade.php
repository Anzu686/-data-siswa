<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container mt-5 pt-3 pb-5 justify-content-center  ">
        <div class="row">
            <div class="col-4 justify-content-center">
                <h2 class="text-center">Registrasi</h2>
             
                <div class="card shadow rounded-1">
                    <div class="card-body">
                    <form action="/registrasi" method="post">
                        @csrf
                        {{-- //{{ route('registrasi.store') }} --}}
                       
                            <div class="form-group mt-3 mb-3">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                           
                            </div>
                            <div class="form-group mt-3 mb-3">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group mt-3 mb-3">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control " id="exampleInputPassword1" placeholder="Password" name="password">
                            </div>

                           <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          
                    
                    
                    </form>

                       
                    </div>
                  </div>
                  
            </div>
            
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>