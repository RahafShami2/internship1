<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> My Stickers</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <div class="panel-body">
        <img src="{{ asset('/images/logo.png') }}" width="55" height="55">
    </div>
        <a class="navbar-brand ps-3 font-weight-bold" href="/">My Stickers</a>
        <form action="/search" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" name="search" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-dark" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
        </form>
    </nav>
    <div class="bottomnav">
     @foreach($categories as $category)
        <a class="navbar-brand ps-3" href="admin">
        {{$category->category}}
        </a>
    @endforeach       
    </div> 
    @yield('content')
    <script src="js/scripts.js"></script>
</body>
<footer id="foote">
    <div class="lastthing">
      <div class="icons col-sm-12" >
        <i class="fab fa-instagram" onclick="window.location.href='//instagram.com/my_.stickers?igshid=NWRhNmQxMjQ='"></i>
        <i class="fab fa-pinterest" onclick="window.location.href='//pin.it/1C51R0J'"></i>
      </div>
      <small>© 2022 My Stickers.</small>
    </div>
  </footer>
</html>