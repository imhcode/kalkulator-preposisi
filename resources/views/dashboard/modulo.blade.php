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
                <li class="breadcrumb-item active">App</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <!-- CONTENT HERE -->
        <!-- Column -->
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    - on progress -
                </div>
            </div>
        </div>
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
