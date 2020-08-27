@extends('fronts.layout')

@section('content')
<br>
<br>
<br>
<div class="container">
<div class="row">
    <div class="col-12">
        <h2 class="contact-title">Login </h2>
    </div>
    <div class="col-lg-8">
        <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your username or email">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control valid" name="password" id="email" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Enter your password">
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="button button-contactForm boxed-btn">Login</button>
            </div>
        </form>
    </div>
    <div class="col-lg-3 offset-lg-1">
        <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
                <h3>Buttonwood, California.</h3>
                <p>Rosemead, CA 91770</p>
            </div>
        </div>
        <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
                <h3>+1 253 565 2365</h3>
                <p>Mon to Fri 9am to 6pm</p>
            </div>
        </div>
        <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
                <h3>support@colorlib.com</h3>
                <p>Send us your query anytime!</p>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<!-- ================ contact section end ================= -->
</div>
@endsection
