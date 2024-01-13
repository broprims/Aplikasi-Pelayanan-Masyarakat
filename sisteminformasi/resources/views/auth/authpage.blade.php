@extends('layouts.app')

@section('content')





<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,600" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel="stylesheet" href="login/style.css">

<div class="container">


    <section id="formHolder">


       <div class="row">

          <!-- Brand Box -->
          <div class="col-sm-6 brand" style="background-image: url('img/bg-login.jpg')">
             <div style="display: flex; line-height: 20px;">
                <img src="/img/logodesa.png" alt="" width="50">
                <div style="margin-left: 10px; margin-top: 7px;">
                   <span style="font-size: 14px;">Desa</span><br>
                   <span style="font-size: 23px;">Pengeragoan</span>
                </div>
             </div>


             <div class="heading">
                <h2>Selamat Datang</h2>
                <p>Website Pelayana Desa Pengeragoan</p>
             </div>

             <div class="success-msg">
                <p>Great! You are one of our members now</p>
                <a href="#" class="profile">Your Profile</a>
             </div>
          </div>


          <!-- Form Box -->
          <div class="col-sm-6 form">

            @if(session()->get('gagal'))
            <div class="alert alert-danger alert-block  pb-5 py-2 pt-5 col-lg-12" style="position: relative; z-index: 100;">
                <p class="text-center"><strong>{{ session()->get('gagal') }}!!!</strong></p>
            </div>
            @endif

            @if(session()->get('logout'))
            <div class="alert alert-warning alert-block  pb-5 py-2 pt-5 col-lg-12" style="position: relative; z-index: 100;">
                <p class="text-center"><strong>{{ session()->get('logout') }}!!!</strong></p>
            </div>
            @endif

            @if(session()->get('success'))
            <div class="alert alert-success alert-block  pb-5 py-2 pt-5 col-lg-12" style="position: relative; z-index: 100;">
                <p class="text-center"><strong>{{ session()->get('success') }}!!!</strong></p>
                <p class="text-center">Silakan Login di sini</p>
            </div>
            @endif


             <!-- login Form -->
             <div class="signup form-peice">
                <form class="signup-form" action="{{route('login')}}" method="post">
                    @csrf
                   <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="username" id="username" required autocomplete="off">
                      @if(session()->get('gagal'))
                        <p class="text-danger" style="font-size: 10px; position: absolute;">Mungkin username yang anda masukan salah!!!</p>
                      @endif
                   </div>

                   <div class="form-group">
                      <label for="loginPassword">Password</label>
                      <input type="password" name="password" id="password" required autocomplete="off">
                      @if(session()->get('gagal'))
                      <p class="text-danger" style="font-size: 10px; position: absolute;">Mungkin password yang anda masukan salah!!!</p>
                    @endif
                   </div>

                   <div class="CTA">
                      <input type="submit" value="Login">
                      <div class="mt-5">
                        Belum punya akun? <a href="{{ route('register') }}">Register</a>
                     </div>
                   </div>
                </form>

                
             </div><!-- End register Form -->
             
          </div>
       </div>

    </section>


 </div>

 <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="login/script.js"></script>
@endsection

