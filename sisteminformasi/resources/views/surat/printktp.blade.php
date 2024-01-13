<!DOCTYPE html>
<html>
<head>
    <title>Surat Permohonan</title>
    <style type="text/css">
        *{
            font-family: Arial, Helvetica, sans-serif;
        }

		.space{
			width: 85%;
			height: 80vh;
		}

		.p{
			font-size: 12px;
			line-height: 15px;
		}

		.input{
			border: 1px solid black;
			padding: 0 20px 0 0;
			font-size: 11px;
		}

		.input1{
			border: 1px solid black;
			font-size: 12px;
		}

		.input2{
			border: 1px solid black;
			font-size: 12px;
			padding: 0 10px 0 ;
			margin-left: 40px;
		}
		.input3{
			border: 1px solid black;
			font-size: 12px;
			padding: 0 20px 0 ;
		}

		.input4{
			border: 1px solid black;
			font-size: 12px;
			padding: 15px 10px 0 ;
			margin-left: 40px;
		}
		.input5{
			border: 1px solid black;
			font-size: 12px;
			padding: 0 40px 0 ;
		}
    </style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	
	<div class="space mx-5 mt-5">
		<center>
		<div>
			<div class="justify-content-end d-flex">
				<div style="border: 1px solid black;" class="px-4">
					<h1 style="font-size: 25px; font-weight: 600; letter-spacing: 1px;">F-1.07</h1>
				</div>
			</div>

			<div class="mt-2">
				<h1 style="font-size: 17px; font-weight: 600;">FORMULIR PERMOHONAN KARTU TANDA PENDUDUK (KTP)</h1>
			</div>
		</div>
		</center>

		<div style="border: 1px solid black; width: 90%; margin-left: 10%; line-height: 1px;" class="px-1">
			<span class="p"><b>Perhatian :</b></span><br>
			<span class="p">1. Harap diisi dengan huruf cetak an menggunakan tinta hitam.</span><br>
			<span class="p">2. Untuk kolom pilihan, harap memberi tanda silang (X) pada kotak pilihan.</span><br>
			<span class="p">3. Setelah formulir ini diisi dan ditandatangani, harap diserahkan kembali ke kantor Desa/Kelurahan</span><br>
		</div>

		@foreach ($permohonan as $data)
		<div style="width: 90%; margin-left: 10.5%; line-height: 14px;" class="mt-3">
			<span style="font-size: 14px;">
				<b>PEMERINTAH PROVINSI</b>
			</span> 
			<span style="margin-left: 90.1px; font-size: 12px;">:</span> 
			<span class="input" style="margin-left: 10px;"></span>
			<span class="input" style="margin-left: 1px;"></span>
			<span style="margin-left: 65px; padding: 0 300px 0 10px;" class="input1">{{ $data->provinsi }}</span><br>


			<span style="font-size: 14px;"><b>PEMERINTAH KABUPATEN/KOTA</b></span> 
			<span style="margin-left: 29px; font-size: 12px;">:</span>
			<span class="input" style="margin-left: 10px;"></span>
			<span class="input" style="margin-left: 1px;"></span>
			<span style="margin-left: 64px; padding: 0 260px 0 10px;" class="input1">{{ $data->kab }}</span>
			<br>

			<span style="font-size: 14px;"><b>KECAMATAN</b></span> 
			<span style="margin-left: 165.1px; font-size: 12px;">:</span>
			<span class="input" style="margin-left: 10px;"></span>
			<span class="input" style="margin-left: 1px;"></span>
			<span style="margin-left: 64px; padding: 0 265px 0 10px;" class="input1">{{ $data->kec }}</span>
			<br>

			<span style="font-size: 14px;"><b>KELURANAHAN/DESA</b></span> 
			<span style="margin-left: 102px; font-size: 12px;">:</span>
			<span class="input" style="margin-left: 10px;"></span>
			<span class="input" style="margin-left: 1px;"></span>
			<span class="input" style="margin-left: 1px;"></span>
			<span class="input" style="margin-left: 1px;"></span>
			<span style="margin-left: 18px; padding: 0 258px 0 10px;" class="input1">{{ $data->kab }}</span>
			<br>
		</div>

		<div style="width: 90%; margin-left: 10.5%;" class="mt-3">
			<div class="d-flex">
				<span style="font-size: 14px; text-decoration: underline;">
					<i><b>PERMOHONAN KTP</b></i>
				</span>
				<div>
					<div class="d-flex">
						@if ($data->jenis_permohonan == "a. baru")
						<span class="input2"><i class="fas fa-check"></i></span>
						<div class="input3 text-center">A. Baru</div>

						<span class="input2"></span>
						<div class="input3 text-center">A. Perpanjang</div>

						<span class="input2"></span>
						<div class="input3 text-center">A. Penggantian</div>
							
						@elseif($data->jenis_permohonan == "b. perpanjang")
						<span class="input2"></span>
						<div class="input3 text-center">A. Baru</div>

						<span class="input2"><i class="fas fa-check"></i></span>
						<div class="input3 text-center">B. Perpanjang</div>

						<span class="input2"></span>
						<div class="input3 text-center">A. Penggantian</div>

						@elseif($data->jenis_permohonan == "c. penggantian")
						<span class="input2"></span>
						<div class="input3 text-center">A. Baru</div>

						<span class="input2"></span>
						<div class="input3 text-center">A. Perpanjang</div>

						<span class="input2"><i class="fas fa-check"></i></span>
						<div class="input3 text-center">C. Penggantian</div>

						

						@endif
					</div>
					<div class="d-flex">
						<span class="input4"></span>
						<div class="input5 text-center"></div>
					</div>
				</div>
			</div>
		</div>

		<div style="width: 90%; margin-left: 10.5%;" class="mt-4">
			<div class="d-flex">
				<p style="border: 1px solid black; font-size: 12px; padding:0 30px 0 5px ;">1. Nama Lengkap</p>
				<p style="border: 1px solid black; font-size: 12px; padding:0 0 0 5px ; margin-left: 10px; width: 82%;">{{ $data->nama }}</p>
			</div>

			<div class="d-flex" style="margin-top: -16px;">
				<p style="border: 1px solid black; font-size: 12px; padding:0 56.2px 0 5px ;">2. Nomor KK</p>
				<p style="border: 1px solid black; font-size: 12px; padding:0 0 0 5px ; margin-left: 10px; width: 82%;">{{ $data->no_kk }}</p>
			</div>

			<div class="d-flex" style="margin-top: -16px;">
				<p style="border: 1px solid black; font-size: 12px; padding:0 91.5px 0 5px ;">3. NIK</p>
				<p style="border: 1px solid black; font-size: 12px; padding:0 0 0 5px ; margin-left: 10px; width: 82%;">{{ $data->nik }}</p>
			</div>

			<div class="d-flex" style="margin-top: -16px;">
				<p style="border: 1px solid black; font-size: 12px; padding:0 74.2px 0 5px ;">4. Alamat</p>
				<p style="border: 1px solid black; font-size: 12px; padding:0 0 0 5px ; margin-left: 10px; width: 82%;">{{ $data->alamat }}</p>
			</div>
		</div>

		<div style="width: 90%; margin-left: 10.5%;" class="">
			<div class="d-flex">
				<div class="d-flex">
					<div style="margin-left: 142px;" class="d-flex">
						<span style="font-size: 12px; border: 1px solid black; padding: 0 2px 0 2px;">RT</span>
						<span class="input2" style="margin-left: -1px; font-size: 12px;"></span>
					</div>
	
					<div style="margin-left: -20px;" class="d-flex">
						<span class="input2" style="font-size: 12px;"></span>
						<span class="input2" style="margin-left: -1px; font-size: 12px;"></span>
						<span class="input2" style="margin-left: -1px; font-size: 12px;"></span>
					</div>
				</div>

				<div class="d-flex" style="margin-left: -110px;">
					<div style="margin-left: 142px;" class="d-flex">
						<span style="font-size: 12px; border: 1px solid black; padding: 0 2px 0 2px;">RW</span>
						<span class="input2" style="margin-left: -1px; font-size: 12px;"></span>
					</div>
	
					<div style="margin-left: -20px;" class="d-flex">
						<span class="input2" style="font-size: 12px;"></span>
						<span class="input2" style="margin-left: -1px; font-size: 12px;"></span>
						<span class="input2" style="margin-left: -1px; font-size: 12px;"></span>
					</div>
				</div>

				<div class="d-flex" style="margin-left: -90px;">
					<div style="margin-left: 142px;" class="d-flex">
						<span style="font-size: 12px; border: 1px solid black; padding: 0 20px 0 2px;">Kode Pos: </span>
					</div>
	
					<div style="margin-left: -20px;" class="d-flex">
						<span class="input2" style="font-size: 12px; letter-spacing: 5px;">{{ $data->kode_pos }}</span>
					</div>
				</div>
			</div>
		</div>	
		<div class="mt-5" style="margin-left: 7%;">
			<img src="../ktp/ktp1.png" alt="" style="width: 100%; height: 30vh;">
		</div>
		@endforeach

		<div class="mt-5" style="margin-left: 7%;">
			<img src="../ktp/ktp2.png" alt="" style="width: 100%; height: 60vh;">
		</div>

		<div class="mt-5" style="margin-left: 7%;">
			<img src="../ktp/ktp3.png" alt="" style="width: 100%; height: 60vh;">
		</div>
	</div>
	
</body>
<script type="text/javascript">
	window.print();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>

