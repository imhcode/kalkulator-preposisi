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
                <li class="breadcrumb-item active">Contact</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <!-- CONTENT HERE -->
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-block">
                    <center class="m-t-30"> <img src="{{$user->thumbs}}" class="img-circle" width="150" />
                        <h4 class="card-title m-t-10"></h4>
                        <h6 class="card-subtitle"></h6>
                    </center>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                        

                        <div class="form-group" style="border-bottom: 1px dashed #ddd; padding-bottom: 5px">
                            <label class="col-md-4" style="font-weight: 700">Full Name</label>
                            <div class="col-md-8">
                                {{$user->full_name}}
                            </div>
                        </div>






                        <div class="form-group" style="border-bottom: 1px dashed #ddd; padding-bottom: 5px">
                            <label class="col-md-4" style="font-weight: 700">NIM</label>
                            <div class="col-md-8">
                                {{$user->nim}}
                            </div>
                        </div>
                        <div class="form-group" style="border-bottom: 1px dashed #ddd; padding-bottom: 5px">
                            <label class="col-md-4" style="font-weight: 700">Gender</label>
                            <div class="col-md-8">
                                {{ ($user->gender == 'P') ? 'Perempuan' : 'Laki-Laki' }}
                            </div>
                        </div>
                        <div class="form-group" style="border-bottom: 1px dashed #ddd; padding-bottom: 5px">
                            <label class="col-md-4" style="font-weight: 700">Email</label>
                            <div class="col-md-8">
                                {{$user->email}}
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

</div>
@endsection

@section('script')
<script type="text/javascript">
    checkimage();
    var urlobj;

    function BrowseServer(obj)
    {
        urlobj = obj;
        OpenServerBrowser(
        '{{url("/laravel-filemanager?type=Images")}}',
        screen.width * 0.7,
        screen.height * 0.7 ) ;
    }

    function OpenServerBrowser( url, width, height )
    {
        var iLeft = (screen.width - width) / 2 ;
        var iTop = (screen.height - height) / 2 ;
        var sOptions = "toolbar=no,status=no,scrollbars=1,resizable=yes,dependent=yes" ;
        sOptions += ",width=" + width ;
        sOptions += ",height=" + height ;
        sOptions += ",left=" + iLeft ;
        sOptions += ",top=" + iTop ;
        var oWindow = window.open( url, "BrowseWindow", sOptions ) ;
    }

function SetUrl( url, width, height, alt )
{
    document.getElementById(urlobj).value = url ;
    oWindow = null;
    checkimage();
}
     function checkimage(){
        if( $('#page_image').val() != ''){
            $('.post_preview_image').show();
            $('.view_this').attr('src',$('#page_image').val());
        }else{
            $('.post_preview_image').hide();
            $('.view_this').attr('src','');
        }
    }
    $(document).ready(function(){
        $('#page_image').change(function(){
            checkimage();
        });
    });
 </script>

@endsection
