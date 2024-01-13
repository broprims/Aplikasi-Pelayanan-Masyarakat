<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layanan Masyarakat</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-gray-300">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <div class="d-flex">

                <a class="p-3 d-flex">
                    <img src="/img/logodesa.png" alt="" width="50" height="20">
                    <div style="margin-left: 10px; margin-top: 7px; line-height: 15px;">
                        <span style="font-size: 10px;">Layanan Masyarakat</span><br>
                        <span style="font-size: 15px;">Desa Pengeragoan</span>
                    </div>
                </a>


                
            </div>



          {{-- <div class="d-flex">

            <ul class="mb-lg-0 d-flex">
                
                @guest
                <li class="">
                    <a href="{{ route('authpage') }}" class="btn btn-primary" >Login</a>
                </li>
                @endguest
            </ul>



          </div> --}}
        </div>
      </nav>
    @yield('content')
    @yield('scripts')
</body>
</html>
