@extends('layouts.home')

@section('meta')
    <title>{{ $metatitle }} | Dashboard </title>
    <meta name="description" content="">
@endsection

@section('style')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-12 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">{{$metatitle}}</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/dashboard/users') }}">users</a></li>
                <li class="breadcrumb-item active">add</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <!-- CONTENT HERE -->
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-block">
                    <center class="m-t-30"> <img src="{{ url('/assets/images/not-available.png')}}" class="img-circle" width="150" />
                        <h4 class="card-title m-t-10"></h4>
                        <h6 class="card-subtitle"></h6>
<!--                         <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                        </div> -->
                    </center>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="row">
                                
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="" placeholder="First Name . . ." name="first_name">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="" placeholder="Last Name . . ." name="last_name">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="" placeholder="Email . . ." name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Images</label>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="image_profile" id="page_image" alt="Image thumbnail" placeholder="Avatar" >
                                    <span class="input-group-btn" style="margin-bottom: 11px">
                                        <button style="margin-bottom: -5px" onclick="BrowseServer('page_image');" type="button" class="btn bg-lgns waves-effect">Select Image</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" value="" name="password" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Confirm Password</label>
                            <div class="col-md-12">
                                <input type="password" value="" name="confirm_password" class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-themecolor">Add User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

</div>
@endsection

@section('script')

@endsection
