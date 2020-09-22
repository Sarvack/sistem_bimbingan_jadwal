@extends('fronts.layout')

@section('content')
<br>
<br>
<br>
<div class="container">
<div class="row">
    <div class="col-12">
        <h2 class="contact-title">Login</h2>
    </div>

     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-lg-8">
        <form class="form-contact contact_form" action="/login/mahasiswa" method="POST">
            <div class="row">
                @csrf
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control valid" name="email" id="email" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your email'" placeholder="Enter your email">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control valid" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter valid password'" placeholder="Enter your password">
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="button button-contactForm boxed-btn">Login</button>
            </div>
        </form>
    </div>

</div>
</div>
</section>
<!-- ================ contact section end ================= -->
</div>
@endsection
