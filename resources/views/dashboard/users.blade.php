@extends('layouts.home')

@section('meta')
    <title>{{ $metatitle }} | Dashboard </title>
    <meta name="description" content="">
@endsection

@section('style')
<style type="text/css">
.wrap-img {
    width: 100px;
    overflow: hidden;
    margin: auto;
        margin-top: auto;
    height: 100px;
    margin-top: 20px;
    border-radius: 100px;
    border: 2px solid #c14335;
}
.wrap-img img {
    width: 100%;
    padding: 2px;
    border-radius: 100px;
}
.wrap-info span {
    text-align: center;
    margin: auto;
        margin-top: auto;
    display: block;
    margin-top: 10px;
    font-weight: 500;
    font-size: 14px;
}
.wrap-info p {
    text-align: center;
    margin: auto;
    display: block;
    font-size: 12px;
    color: #aaa;
}
.profile-action {
    display: block;
    width: 100%;
    overflow: hidden;
    padding: 0;
    margin-top: 10px;
}
.profile-action a {
    width: 50%;
    display: block;
    padding: 15px;
    margin: 0;
    float: left;
    text-align: center;
    color: #c14335;
    background: #f0f0f0;
    border: 1px solid #fff;
    transition: 0.2s ease-in;
}
.profile-action a:hover{
    color: #f0f0f0;
    background: #c14335;
}
.button-add-user{
    float: right;
    margin-bottom: 20px;
}
.button-add-user .btn{
    background: #c14335;
    color: #fff;
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-12 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">{{$metatitle}}</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">users</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <!-- CONTENT HERE -->
        <div class="col-12">
            <div class="button-add-user">
                <a href="{{ url('/dashboard/user/add') }}"><span class="btn"><i class="fa fa-plus"></i> Tambah Anggota</span></a>
            </div>
        </div>
        @foreach( $users as $user)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card">
                <div class="card-block">
                    <div class="wrap-img">
                        <img src="{{$user->thumbs}}"/>
                    </div>
                    <div class="wrap-info">
                        <span>{{$user->full_name}}</span>
                        <p>{{$user->nim}}</p>
                    </div>
                    <div class="profile-action">
                        <a href="{{url('/dashboard/user/edit/'.$user->id)}}"><i class="fa fa-pencil"></i></a>
                        <a href="{{url('/dashboard/user/delete/'.$user->id)}}"><i class="fa fa-trash"></i></a>
                    </div>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection

@section('script')

@endsection
