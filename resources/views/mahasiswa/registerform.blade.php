<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Halaman Registrasi Mahasiswa</title>

    <!-- Icons font CSS-->
    <link href="{{ URL::asset('landing/assets/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ URL::asset('landing/assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet') }}" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ URL::asset('landing/assets/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ URL::asset('landing/assets/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ URL::asset('landing/assets/css/main.css') }}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-45 p-b-50">
        <div class="wrapper wrapper--w680">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Registrasi Dosen</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="/mahasiswa/registerpost" enctype="multipart/form-data">
                        <div class="form-row" data-validate="Nama is required">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nama" value="{{ old('nama') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" data-validate="NIM is required">
                            <div class="name">NIM</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="nim" value="{{ old('nim') }}">
                                </div>
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="name">Prodi</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            @foreach ($prodi as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Konsentrasi</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            @foreach ($prodik as $pk)
                                                <option value="{{ $pk->id }}">{{ $pk->nama }}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Angkatan</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            @foreach ($angkatan as $a)
                                                <option value="{{ $a->id }}">{{ $a->nama }}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" data-validate="Email is required">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" data-validate="Password is required">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" data-validate="NIM is required">
                            <div class="name">NIM</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nim" value="{{ old('nim') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" data-validate="NIK is required">
                            <div class="name">NIK</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nik" value="{{ old('nik') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" data-validate="NIM is required">
                            <div class="name">Tempat Lahir</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" data-validate="NIM is required">
                            <div class="name">Agama</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="agama" value="{{ old('agama') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Jenis Kelamin</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Laki-Laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="form-row" data-validate="No.Telepon is required">
                            <div class="name">No.Telepon</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="no_telp" value="{{ old('no_telp') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" data-validate="Nama Ayah is required">
                            <div class="name">Nama Ayah</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nama_ayah" value="{{ old('nama_ayah') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" data-validate="Nama Ibu is required">
                            <div class="name">Nama Ibu</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nama_ibu" value="{{ old('nama_ibu') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" data-validate="NIM is required">
                            <div class="name">No.Telp OrangTua</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="no_telp_ortu" value="{{ old('no_telp_ortu') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" data-validate="Alamat is required">
                            <div class="name">Alamat</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="alamat" value="{{ old('alamat') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" data-validate="Ijazah Terakhir is required">
                            <div class="name">Ijazah Terakhir</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="ijazah_terakhir" value="{{ old('ijazah_terakhir') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Foto</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="file" name="foto" value="{{ old('foto') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">File Ijazah Terakhir</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="file" name="foto" value="{{ old('foto') }}">
                                </div>
                            </div>
                        </div>
                        {{-- hidden input --}}
                        <input type = "hidden" name = "tipe" value ="Mahasiswa">
                        <input type = "hidden" name = "profil_id" value ="{{ rand(1,10000) }}">
                        <input type = "hidden" name = "id_user" value ="{{ rand(10,10000) }}">
                        {{-- end hidden --}}
                        <div class="form-row">
                            <label class="label label--block">Klik <a href="#">Disini</a> jika sudah punya akun</label>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ URL::asset('landing/assets/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ URL::asset('landing/assets/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('landing/assets/vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ URL::asset('landing/assets/vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ URL::asset('landing/assets/js/global.js') }}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

<script type="text/javascript">
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>

</html>
<!-- end document-->