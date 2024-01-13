<!DOCTYPE html>
<html>
<head>
	<title>Surat Pengajuan</title>
	<style type="text/css">
		font{
			font-family: Arial, Helvetica, sans-serif;
		}

		table {
			width: 500px;
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table .text2 {
			text-align: center;
			font-family: Arial, Helvetica, sans-serif;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

	</style>
</head>
<body>
	<center>
		<div style="border: 1px solid black; width: 600px; margin-top: 10px; padding-top: 20px; padding-bottom: 20px;">
			<table>
				<tr>
					<td><img src="/img/logo.png" width="90" height="90"></td>
					<td>
					<center style="line-height: 24px;">
						<font size="4" style="font-size: 16px;">PEMERINTAH KABUPATEN JEMBRANA</font><br>
						<font size="5" style="font-size: 14px; font-style: italic;"><b>KECAMATAN PEKUTATAN</b></font><br>
						<font size="2" style="font-size: 12px; font-style: italic;"><b>KANTOR PERBEKEL DESA PENGERAGOAN</b></font><br>
					</center>
					</td>
				</tr>
	
				<tr>
					<td colspan="2"><hr style="height: -2px;"><hr style="height: 2px; background-color: black; margin-top: -5px;"></td>
				</tr>
			</table>
	
	
	
			<table style="margin-top: -10px;">
				{{-- <tr class="text2">
					<td style="font-size: 18px; text-decoration: underline;"><b>SURAT KETERANGAN KELAHIRAN</b></td>
				</tr> --}}
	
				<tr class="text2">
					<td style="font-size: 18px; text-decoration: underline;"><b>SURAT PERMOHONAN</b></td>
				</tr>
	
				<tr class="text2">
					@foreach ($pengajuan as $surat)
					<td style="font-size: 16px;"><b>Nomer : {{$surat->kode_surat}}</b></td>
					@endforeach
				</tr>
			</table>
	
			<br>
			{{-- <table width="625" style="margin-top: 5px;">
				<tr>
				   <td>
					   <font size="2" style="font-size: 14px; text-decoration: underline; font-family: 'Times New Roman', Times, serif;">
						<b>Yang bertanda tangan dibawah ini :</b></font>
				   </td>
				   
				</tr>
			</table>
	
			<table style="margin-right: -40px; line-height: 20px;">
				<tr>
					<td style="width: 100px; font-size: 14px;">Nama</td>
					<td style="font-size: 14px;">: I Wayan Balik Kari, SS.</td>
				</tr>
				<tr>
					<td style="font-size: 14px;">Jabatan</td>
					<td style="font-size: 14px;">: Perbekel Desa Penegragoan</td>
				</tr>
			</table> --}}
	
			<table width="625" style="margin-top: 5px;">
				<tr>
				   <td>
					   <font size="2" style="font-size: 14px; text-decoration: underline; font-family: 'Times New Roman', Times, serif;">
						<b>Dengan ini menerangkan bahwa :</b></font>
				   </td>
				   
				</tr>
			</table>
	
			@foreach ($pengajuan as $surat)
			<table style="margin-right: -40px; line-height: 20px;">
				<tr>
					<td style="width: 120px; font-size: 12px;">Jenis Surat</td>
					<td style="font-size: 12px; text-transform:capitalize;">: Surat Permohonan {{ $surat->jenis_surat }}</td>
				</tr>

				<tr>
					<td style="width: 120px; font-size: 12px;">Jenis Permohonan</td>
					<td style="font-size: 12px; text-transform:capitalize;">: {{ $surat->jenis_permohonan }}</td>
				</tr>
	
				<tr>
					<td style="width: 120px; font-size: 12px;">Nama</td>
					<td style="font-size: 12px;">: {{ $surat->nama }}</td>
				</tr>
	
				<tr>
					<td style="width: 120px; font-size: 12px;">Tempat/tanggal lahir</td>
					<td style="font-size: 12px;">: {{ $surat->tempat_lahir }}, {{ $surat->tgl_lahir }}</td>
				</tr>
	
				<tr>
					<td style="width: 120px; font-size: 12px;">Jenis Kelamin</td>
					<td style="font-size: 12px;">: {{ $surat->gender }}</td>
				</tr>
	
				<tr>
					<td style="width: 120px; font-size: 12px;">Agama</td>
					<td style="font-size: 12px;">: {{ $surat->agama }}</td>
				</tr>
	
				<tr>
					<td style="width: 120px; font-size: 12px;">Status Perkawinan</td>
					<td style="font-size: 12px;">: {{ $surat->status_perkawinan }}</td>
				</tr>
	
				<tr>
					<td style="width: 120px; font-size: 12px;">Pekerjaan</td>
					<td style="font-size: 12px;">: {{ $surat->pekerjaan }}</td>
				</tr>
	
				<tr>
					<td style="width: 120px; font-size: 12px;">NIK</td>
					<td style="font-size: 12px;">: {{ $surat->nik }}</td>
				</tr>
	
				<tr>
					<td style="width: 120px; font-size: 12px;">Warga Negara</td>
					<td style="font-size: 12px;">: {{ $surat->negara }}</td>
				</tr>
	
				<tr>
					<td style="font-size: 12px;">Alamat</td>
					<td style="font-size: 12px;">: {{ $surat->alamat }}</td>
				</tr>
	
				<tr>
					<td style="width: 120px; font-size: 12px;">Keterangan</td>
					<td style="font-size: 12px;">: {{ $surat->keterangan }}</td>
				</tr>
			</table>
			@endforeach
	
	
	
	
			<br>
			<table width="625">
				<tr>
				   <td>
					   <font size="2" style="font-family: 'Times New Roman', Times, serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian Surat Keterangan Ini kami buat dengan sebenarnya untuk dapat
						Dipergunakan sebagaimana mestinya.
						
					   </font>
				   </td>
				</tr>
			</table>
			<br>
			{{-- <table width="625" style="margin-top: 20px; margin-bottom: 50px;">
				<tr>
					<td width="430" style="width: 300px;"><br><br><br><br><br><br><br></td>
					<td class="text" style="text-align: left;">Pengeragoan,<br>Perbekel Desa Pengeragoan<br><br><br><br><br><br>(I Wayan Balik Kari, SS)</td>
				</tr>
			</table> --}}
		</div>
	</center>
</body>
</html>