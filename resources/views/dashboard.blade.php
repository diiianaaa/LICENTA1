@extends('frontend.main_master')
@section('content')

@section('title')
 My Cart Page
@endsection




<div class="padding">
 
        <!-- Column -->
        <div class="card"> <img class="card-img-top" src="../frontend/assets/images/banners/muffin.png" alt="Card image cap">
            <div class="card-body little-profile text-center">
                <div class="pro-img" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" height="100%" width="100%" alt="user"><br><br></div>
                <h3 class="m-b-0">{{ Auth::user()->name }}</h3>
                @if(session()->get('language') == 'english') 
                <p></p> <a href="{{ url('/') }}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Home</a>
                <p></p> <a href="{{ route('user.checkout') }}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">My Orders</a>
                <p></p> <a href="{{ route('user.profile') }}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Profile Update</a>
                <p></p> <a href="{{ url('/user/change/password') }}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Change Password</a>
                <p></p> <a href="{{ route('user.logout') }}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Logout</a>

           @else
           <p></p> <a href="{{ url('/') }}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Zuhause</a>
           <p></p> <a href="{{ route('user.checkout') }}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Meine Bestellungen</a>
                <p></p> <a href="{{ route('user.profile') }}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Profil-Update</a>
                <p></p> <a href="{{ url('/user/change/password')  }}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Passwort ändern</a>
                <p></p> <a href="{{ route('user.logout') }}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Abmeldung</a>
                @endif
        </div>
    </div>
</div>


<style>



body {
    background-color: #000000
}

.padding {
    padding: 3rem !important;
    margin-left: 0px
}

.card-img-top{
    height:300px;
}

.card-no-border .card {
    border-color: #d7dfe3;
    border-radius: 4px;
    margin-bottom: 30px;
    -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem
}

.pro-img {
    margin-top: -80px;
    margin-bottom: 20px
}

.little-profile .pro-img img {
    width: 128px;
    height: 128px;
    -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    border-radius: 100%
}

html body .m-b-0 {
    margin-bottom: 0px
}

h3 {
    line-height: 30px;
    font-size: 21px
}

.btn-rounded.btn-md {
    padding: 12px 35px;
    font-size: 16px
}

html body .m-t-10 {
    margin-top: 10px
}

.btn-primary,
.btn-primary.disabled {
    background: #7460ee;
    border: 1px solid #7460ee;
    -webkit-box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
    box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
    -webkit-transition: 0.2s ease-in;
    -o-transition: 0.2s ease-in;
    transition: 0.2s ease-in
}

.btn-rounded {
    border-radius: 60px;
    padding: 7px 18px
}

.m-t-20 {
    margin-top: 20px
}

.text-center {
    text-align: center !important
}

h1,
h2,
h3,
h4,
h5,
h6 {
    color: #455a64;
    font-family: "Poppins", sans-serif;
    font-weight: 400
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}


</style>


@endsection