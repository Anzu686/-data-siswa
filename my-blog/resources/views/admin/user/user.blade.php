<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary justify-content-evenly fixed-top">
      @can('admin')
      <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        Punya Admin
      </a>
      @endcan
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Jurusan
              </a>
              <ul class="dropdown-menu">
                @foreach($jurusans as $jurusan)
                <li><a class="dropdown-item" href="{{ route('jurusan', $jurusan->id) }}">{{ $jurusan->name }}</a></li>
                @endforeach
              </ul>
      </div>
      @auth
     
          <form class="d-flex" action="{{ route('siswa.index') }}">
            <input class="form-control me-2" type="text" placeholder="Cari Siswa" value="{{ request('search') }}" name="search">
            <button class="btn btn-outline-success" type="submit">Cari</button>
          </form>  
       
            <form action="/logout" method="post">
              @csrf
            <button class="btn btn-danger" type="submit">
              <b>Logout</b>
             </button>
            </form>
          
              
          
          @endauth
        
      
    </nav> 
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div>
         woi admin
        </div>
        <div class="list-group">
         
          <a href="admin/addjurusan" class="list-group-item list-group-item-action">Jurusan</a>
          <a href="admin/user" class="list-group-item list-group-item-action">Petugas</a>
          
        </div>

      </div>
    </div>

    <div class="container mt-5 pt-3 pb-5 justify-content-center">
        <div class="text-center fs-2 "> <h1>Data User</h1></div>
        <div class="row">
            <div class="col-12 justify-content-center">
              <!-- @auth
                {{-- <a href="{{ Route('siswa.create') }}" class="btn btn-success btn-md mb-1">tambah Data</a> --}}
                @endauth -->
                <div class="card shadow rounded-1">
                    <div class="card-body">
                        <table class="table table-striped ">
                          <thead>
                           
                            <th>Nama</th>
                          
                            <th>Akses</th>
                            <th>Aksi</th>
                          </thead>
                          <tbody>
                        @if ($users->count())
                       
                        @foreach ($users as $user)
                            <tr>
                            
                              <td>{{ $user->name }}</td>
                              {{-- {{ dd($user) }} --}}
                              <td>{{$user->type === 1 ? 'admin' : 'petugas' }}  </td>
                             
                           
                              <td>
                              <a href="{{ route('updateuse', $user->id) }}" class="btn btn-success">Edit</a>
                              </td>
                            </tr>
                            
                          
                          
                        @endforeach
                            </tbody>
                          </table>
                        @else
                        <div class="alert alert-danger text-center" role="alert">
                          Belum Ada Data
                        </div>
                        @endif

                    </div>
                </div>
               
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>