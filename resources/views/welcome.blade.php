<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>TASK</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-muted">
    <div class="container">
        <a class="nav-link text-muted px-2" href="#">Application name</a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-muted" aria-current="page" href="#">Home</a>
                </li>
            </ul>
        </div>
        <a class="nav-link d-flex">
            @auth
                {{ Illuminate\Support\Facades\Auth::user()->email }}
            @endauth
            @guest
                Guest
            @endguest
        </a>
    </div>
</nav>
<div class="container">
    <main>
        <div class="row g-5 px-2 py-4">
            <div class="col-md-4 col-lg-4">
                <h4 class="mb-3">Api Token</h4>
                <form method="POST" action="{{ route('token.generate') }}">
                    @csrf
                    <label for="token" class="form-label fw-bolder mt-2">Token</label>
                    <input type="text" class="form-control" id="token" disabled
                        @auth
                            value="{{ \Illuminate\Support\Facades\Auth::user()->token }}"
                        @endauth
                    >
                    @if (Session::has('successToken'))
                        <div id="successTokenInfo" class="form-text text-success">
                            {{ Session::get('successToken') }}
                        </div>
                    @endif
                    @if (Session::has('errorToken'))
                        <div id="successTokenInfo" class="form-text text-danger">
                            {{ Session::get('errorToken') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-light my-2" @guest disabled @endguest>Generate</button>
                </form>
            </div>
            <div class="col-md-4 col-lg-4">
                <h4 class="mb-3">Register</h4>
                <form method="POST" action="{{ route('registration') }}">
                    @csrf
                    <label for="email" class="form-label fw-bolder mt-2">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    @error('email')
                    @if (Session::has('action') && Session::get('action') == 'register')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                    @endif
                    @enderror
                    <label for="password" class="form-label fw-bolder mt-2">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                           aria-describedby="passwordHelp">
                    @error('password')
                    @if (Session::has('action') && Session::get('action') == 'register')
                        <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
                    @endif
                    @enderror
                    <label for="passwordConfirmation" class="form-label fw-bolder mt-2">Confirm Password</label>
                    <input type="password" class="form-control" id="passwordConfirmation" name="passwordConfirmation"
                           aria-describedby="passwordConfirmationHelp">
                    @error('passwordConfirmation')
                    @if (Session::has('action') && Session::get('action') == 'register')
                        <div id="passwordConfirmationHelp" class="form-text text-danger">{{ $message }}</div>
                    @endif
                    @enderror
                    @if (Session::has('success') && Session::has('action') && Session::get('action') == 'register')
                        <div id="successInfo" class="form-text text-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-light my-2">Register</button>
                </form>
            </div>
            <div class="col-md-4 col-lg-4">
                <h4 class="mb-3">Log In</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label for="email" class="form-label fw-bolder mt-2">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    @error('email')
                    @if (Session::has('action') && Session::get('action') == 'login')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                    @endif
                    @enderror
                    <label for="password" class="form-label fw-bolder mt-2">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                           aria-describedby="passwordHelp">
                    @error('password')
                    @if (Session::has('action') && Session::get('action') == 'login')
                        <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
                    @endif
                    @enderror
                    @if (Session::has('success') && Session::has('action') && Session::get('action') == 'login')
                        <div id="loginSuccessInfo" class="form-text text-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-light my-2 mx-0"
                                    onclick="this.closest('form').submit();">Log In
                            </button>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-light my-2"
                                    onclick='window.location="{{ route('logout') }}"'>Log Out
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-start text-small border-top">
        <p class="mb-1">© 2022 Ruslan Test Application</p>
    </footer>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>
