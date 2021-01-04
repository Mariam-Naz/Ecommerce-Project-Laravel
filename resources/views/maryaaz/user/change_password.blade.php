@extends('maryaaz.layouts.master')
@section('title' , 'Login Register')
@section('content')

  <div class="contact-box-main">
        <div class="container">
            <div class="row">

        <!----------------------------------- SIGN UP ------------------------------------------>
        <div class='col-md-3'></div>
                            <div class='col-md-6'>
                                <div class='contact-form-right'>
                                    @if(Session::has('email-exist-message'))
                                        <div class='alert alert-danger alert-dismissible fade show' role="alert">{{session('email-exist-message')}}
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        @endif
                                     <h2>Change Password</h2>
                                <form class="" action='{{url('/change-password')}}' method="POST">
                                    @csrf
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" placeholder="Your Email" class="form-control" name="email" required data-error="Please enter your email">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required data-error="Please enter your password">

                                    </div>
                                </div>
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" type="submit" name='submit'>Signup</button>
                                        <div  class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                </form>
                                </div>
                        </div>
                <div class='col-md-3'></div>

                </div>
            </div>
        </div>

    @endsection
