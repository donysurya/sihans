<!DOCTYPE html>
<html>
<head>
	<title>Surat Izin Mengunjungi Tahanan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        @page { size: 21cm 33cm potrait; }
	</style>
    <!-- Kop Surat -->
    <div class="row">
        <div class="col-md-12 text-center">
            <h5 class="mb-0">KEJAKSAAN REPUBLIK INDONESIA</h5>
            <h5 class="mb-0">KEJAKSAAN TINGGI KALIMANTAN TENGAH</h5>
            <h4 class="mb-0">KEJAKSAAN NEGERI BARITO TIMUR</h4>
            <p class="mb-0">Jl. Jend. A. Yani Km. 10 Tamiang Layang, Kabupaten Barito Timur 73611</p>
            <p>Fax. (0526) 2091175, www.kejari-baritotimur.go.id</p>
        </div><hr class="bg-dark">
    </div>

    <!-- Header -->
    <div class="row">
        <div class="col-md-12 text-right">
            <p class="mr-3 font-weight-bold mb-0">T-10</p>
        </div>
        <div class="col-md-12 text-center">
            <u class="font-weight-bold text-uppercase mb-0">Surat Izin Mengunjungi Tahanan</u>
            <p class="font-weight-bold mt-0">NOMOR: {{$besuk->nomor_surat}}</p>
        </div>
    </div>
 
    <!-- Konten -->
	<table class='table table-borderless'>
        <tbody>
			<tr>
				<th class="pb-0" colspan="4">Diberikan Kepada :</th>
			</tr>
			<tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Nama</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->user->name}}</td>
            </tr>
			<tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Alamat</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->user->alamat}}</td>
            </tr>
			<tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Pekerjaan</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->user->pekerjaan}}</td>
            </tr>
			<tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Hubungan</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->hubungan}}</td>
            </tr>

            <tr>
				<th class="pb-0" colspan="4">Untuk Mengunjungi Tahanan :</th>
			</tr>

            <tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Nama Lengkap</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->tahanan->nama}}</td>
            </tr>
            <tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Tempat Lahir</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->tahanan->tempat_lahir}}</td>
            </tr>
            <tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Umur / Tanggal Lahir</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->tahanan->tgl_lahir}}</td>
            </tr>
            <tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Jenis Kelamin</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->tahanan->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Kewarganegaraan</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->tahanan->kewarganegaraan}}</td>
            </tr>
            <tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Tempat Tinggal</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->tahanan->alamat}}</td>
            </tr>
            <tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Agama</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->tahanan->agama}}</td>
            </tr>
            <tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Pekerjaan</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->tahanan->pekerjaan}}</td>
            </tr>
            <tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Pendidikan</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->tahanan->pendidikan}}</td>
            </tr>
            <tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Reg. Tahanan</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->tahanan->no_tahanan}}</td>
            </tr>
            <tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Keperluan</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">{{$besuk->keperluan}}</td>
            </tr>
            <tr>
                <td class="pb-0" width="2%"></td>
                <td class="pb-0" width="25%">Izin Berlaku</td>
                <td class="pb-0" width="3%">:</td>
                <td class="pb-0" width="70%">Jam : {{$besuk->start_time}} WIB s/d Jam : {{$besuk->end_time}} WIB <br> Tanggal {{date('d M Y', strtotime($besuk->tgl_kunjungan));}}</td>
            </tr>
		</tbody>
	</table>

    <!-- Konten -->
	<table class='table table-borderless'>
        <tbody>
			<tr>
                <td class="pb-0" width="50%"></td>
                <td class="pb-0 text-center" width="50%">
                    <p class="font-weight-bold mb-0">Tamiang Layang, {{date('d M Y', strtotime('now'));}}</p>
                    <p class="font-weight-bold mb-0 text-uppercase">kepala kejaksaan negeri barito timur</p>
                    <p class="mb-0">.</p>
                    <p class="mb-0">.</p>
                    <p class="mb-0">.</p>
                    <u class="font-weight-bold mb-0 text-uppercase">daniel panannangan, s.h., m.h.</u>
                    <p class="font-weight-bold mb-0 text-uppercase">jaksa madya nip. 19741129 200003 1 001</p>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Footer -->
    <div class="row">
        <div class="col-md-12">
            <u class="font-weight-bold mb-0" style="font-size: 9pt;">Tembusan :</u>
        </div>
        <div class="col-md-12">
            <p class="font-weight-bold mb-0" style="font-size: 9pt;">1. Jaksa Penuntut Umum</p>
            <p class="font-weight-bold mb-0" style="font-size: 9pt;">2. Arsip</p>
        </div>
    </div>
 
</body>
</html>