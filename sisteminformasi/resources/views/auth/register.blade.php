@extends('layouts.app')

@section('content')

            @if(session()->get('error'))
            <div class="alert alert-danger alert-block  pt-3 pb-3 py-1 col-lg-12" style="position: absolute;">
                <button type="button" class="close" data-dismiss="alert" style="margin-top: -3px;"><i class="fa fa-times" aria-hidden="true"></i></button>
                <p class="text-center"><strong>{{ session()->get('error') }}!!!</strong></p>
            </div>
            @endif



<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,600" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href="login/style.css">

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
          <style>
            .auto1{
                display:block;
                padding: 0 0 0 0;
                margin-top:5px;
                height: 350px;
                width: 370px;
                overflow:auto;
            }
          </style>

          <!-- Form Box -->
          <div class="col-sm-6 form">
            @if(session()->get('gagal'))
            <div class="alert alert-danger alert-block  pb-5 py-2 pt-5 col-lg-12" style="position: relative; z-index: 100;">
                <p class="text-center"><strong>{{ session()->get('gagal') }}!!!</strong></p>
            </div>
            @endif

             <!-- register Form -->
             <div class="signup form-peice">
                <form class="signup-form" action="/register" method="POST" >
                    @csrf
                   <div class="auto1">
                        <input type="hidden" name="created_at" value="<?php echo date('d-m-Y'); ?>" id="">
                        <input type="hidden" name="updated_at" value="<?php echo date('d-m-Y'); ?>" id="">
                        <input type="hidden" class="form-control" id="kode_user" name="kode_user" value="M{{$kode_user}}">
                        <input type="hidden" name="no" class="form-control" value="{{$nobaru}}">
                       <input type="hidden" name="id_register" id="id_register">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" id="nik" name="nik" required class="nik @error('nik') is-invalid @enderror" autocomplete="off">
                            @error('nik')
                                    <div class="error text-danger mt-2" style="font-size: 10px;">
                                        {{ $message }}
                                    </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="Nama">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="nama @error('nama') is-invalid @enderror" autocomplete="off">
                            @error('nama')
                            <div class="error text-danger mt-2" style="font-size: 10px;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="username @error('username') is-invalid @enderror" autocomplete="off">
                            @error('username')
                            <div class="error text-danger mt-2" style="font-size: 10px;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="pass" autocomplete="off">
                            <span class="error"></span>
                        </div>

                        {{-- <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="passConfirm" autocomplete="off">
                            <span class="error"></span>
                        </div> --}}

                        <div class="form-group d-none">
                        <input type="text" name="role" value="masyarakat">
                        <span class="error"></span>
                        </div>

                        <div class="CTA">
                            <input type="submit" id="submit" value="register">
                            <a href="{{route('login')}}" class="switch">Sudah punya akun</a>
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

@section('scripts')
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">

    // USER
    $(document).ready(function() {
        $('#nik').keyup( function() {
            var nIk = $(this).val();
            if(nIk) {
                $.ajax({
                    url: '/getUser/'+nIk,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                        if(data){
                            $('#nama').empty();
                            // $('#qontol').append('<option hidden>Choose User</option>');
                            $.each(data, function(key, users){
                                $('#nama').val(users.nama);
                            });
                        }else{
                            $('#nama').empty();
                        }
                    }
                });
            }else{
                $('#nama').empty();
            }

            if(nIk) {
                $.ajax({
                    url: '/getUser/'+nIk,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                        if(data){
                            $('#id_register').empty();
                            // $('#qontol').append('<option hidden>Choose User</option>');
                            $.each(data, function(key, users){
                                $('#id_register').val(users.id_register);
                            });
                        }else{
                            $('#id_register').empty();
                        }
                    }
                });
            }else{
                $('#id_register').empty();
            }

            if(nIk) {
                $.ajax({
                    url: '/getUser/'+nIk,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                        if(data){
                            $('#code').empty();
                            // $('#qontol').append('<option hidden>Choose User</option>');
                            $.each(data, function(key, users){
                                $('#code').val(users.id_register );
                            });
                        }else{
                            $('#code').empty();
                        }
                    }
                });
            }else{
                $('#code').empty();
            }code
        });
    });

</script>

@endsection