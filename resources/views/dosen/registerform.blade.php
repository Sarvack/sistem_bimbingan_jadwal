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
    <title>Halaman Registrasi Dosen</title>

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
                    <form method="POST" action="/dosen/registerpost" enctype="multipart/form-data">
                        <div class="form-row" data-validate="Nama is required">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nama" value="{{ old('nama') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" data-validate="NIP is required">
                            <div class="name">NIP</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="nip" value="{{ old('nip') }}">
                                </div>
                            </div>
                        </div> 
                        <div class="form-row" data-validate="NIDN is required">
                            <div class="name">NIDN</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="nidn" value="{{ old('nidn') }}">
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
                        <div class="form-row" data-validate="Alamat is required">
                            <div class="name">Alamat</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="alamat" value="{{ old('alamat') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" data-validate="Nomor Telepon is required">
                            <div class="name">Nomor Telepon</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="no_telp" value="{{ old('no_tlp') }}">
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
                        {{-- hidden input --}}
                        <input type = "hidden" name = "tipe" value ="Dosen">
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