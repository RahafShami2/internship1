<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - MyStickers Admin</title>
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
        <a class="navbar-brand ps-3" href="/">My Stickers</a>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
    </nav>
                <main>
                <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg rounded-lg mt-auto">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="{{ route('login') }}" method="POST">
                                        @if (session('success'))
                                         <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif   
                                        @if (session('fail')) 
                                         <div class="alert alert-danger">{{ session('fail') }}</div>
                                        @endif                                        
                                          @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="username" placeholder="username"
                                                 @if(Cookie::has('adminuser')) value="{{Cookie::get('adminuser')}}" @endif />
                                                <label for="inputUsername">Username </label>
                                                <span style="color:red">@error('username'){{ $message }}@enderror</span> 
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password"  class="form-control" name="password" placeholder="password"
                                                @if(Cookie::has('adminpass')) value="{{Cookie::get('adminpass')}}" @endif  />
                                                <label for="inputPassword">Password  </label>
                                                <span style="color:red">@error('password'){{ $message }}@enderror</span> 
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name="remember" type="checkbox" 
                                                @if(Cookie::has('adminuser')) checked @endif  />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <div class="d-grid"><button class="form-outline mb-4 btn btn-secondary" type="submit" >Login</button></div>
                                            </div>
                                        </form>
                                    </div>
                                   <!-- <div class="card-footer text-center py-3">
                                        <div class="small"><a href="/register">Sign up for MyStickers!</a></div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
