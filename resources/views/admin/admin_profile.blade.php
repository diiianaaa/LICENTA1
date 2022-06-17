@extends('admin.admin_master')


 
        <!-- Column -->
     
            <div class="card-body1 little-profile text-center">
                <div class="pro-img"><img src="" alt="user"></div>
                <h3 class="m-b-0">{{ Auth::user()->name }}</h3>
                <p></p> <a href="{{ url('/admin/dashboard') }}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Home</a>
                <p></p> <a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Profile Update</a>
                <p></p> <a href="{{ route('password.request') }}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Change Password</a>
                <p></p> <a href="{{ route('user.logout') }}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Logout</a>
           
        </div>



