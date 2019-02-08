@extends('layouts.home')

@section('meta')
    <title>{{ $metatitle }} | Dashboard </title>
    <meta name="description" content="">
@endsection

@section('style')
<style type="text/css">
.buttonit {

    padding: 10px;
    margin-top: 10px;
    border-radius: 5px;
    background: #c14335;
    color: #fff;
    cursor: pointer;

}
.display{
}
.text-preview{
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    min-height: 100px;
}
.hasil-preview{
    display: block;
    width: 100%;
    border: 3px solid #c14335;
    overflow: hidden;
    padding: 20px;
    margin-top: 10px;
    float: left;
    font-size: 12px;
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
                    <div class="row">
                        <div class="calc col-4">
                            <div class="button-all">
                                <button class="buttonit" onclick="add(1)">p</button>
                                <button class="buttonit" onclick="add(2)">q</button>
                                <button class="buttonit" onclick="add(3)">r</button>
                                <button class="buttonit" onclick="add(4)">T</button>
                                <button class="buttonit" onclick="add(5)">F</button>
                                <br>
                                <button class="buttonit" onclick="add(6)">∨</button>
                                <button class="buttonit" onclick="add(7)">∧</button>
                                <button class="buttonit" onclick="add(8)">¬</button>
                                <button class="buttonit" onclick="add(9)">(</button>
                                <button class="buttonit" onclick="add(0)">)</button>
                                <br>
                                <button class="buttonit" onclick="del()">Backpace</button>
                            </div>
                        </div>
                        <div class="display col-8">
                            <div class="text-preview {{(isset($list) && isset($soal)) ? 'hide': ''}}"></div>
                            <form action="{{url('/dashboard/app/table-kebenaran')}}" method="post" class="{{(isset($list) && isset($soal)) ? 'hide': ''}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="fullscript" class="input_table">
                            <button class="btn btn-info pull-right solve">Sederhanakan!</button>
                            </form>
                            @if(isset($list) && isset($soal))
                            <div class="hasil-preview">
                                Soal : <h3>{{$soal}}</h3><br>

                                jawaban : 
                                <table class="table">
                                    @foreach($list as $l)
                                    <tr>
                                        <td>{{$l[1]}}</td>
                                        <td>Hukum {{$l[0]}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <a href="{{url('/dashboard/app/table-kebenaran')}}" class="btn btn-info pull-right solve" style="margin-top: 20px;">Buat Baru</a>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <h3>Rangkuman</h3>
                        <p>
                            
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script type="text/javascript">
    function del(){
        text = $('.text-preview').html();
        c = text.length;
        if(c != 0){
            text = text.substring(0, c-1);
            $('.text-preview').html(text);
        }

        inpt = $('.input_table').val();
        c1 = inpt.length;
        if(c1 != 0){
            inpt = inpt.substring(0, c1-3);
            $('.input_table').val(inpt);
        }
    }


    function add(inpt){
        if(inpt == 1){
            txt = $('.text-preview').html();
            $('.text-preview').html(txt+'p');

            input = $('.input_table').val();
            $('.input_table').val(input+'{p}');
        }

        else if(inpt == 2){
            txt = $('.text-preview').html();
            $('.text-preview').html(txt+'q');

            input = $('.input_table').val();
            $('.input_table').val(input+'{q}');
        }

        else if(inpt == 3){
            txt = $('.text-preview').html();
            $('.text-preview').html(txt+'r');

            input = $('.input_table').val();
            $('.input_table').val(input+'{r}');
        }

        else if(inpt == 4){
            txt = $('.text-preview').html();
            $('.text-preview').html(txt+'T');

            input = $('.input_table').val();
            $('.input_table').val(input+'{T}');
        }

        else if(inpt == 5){
            txt = $('.text-preview').html();
            $('.text-preview').html(txt+'F');

            input = $('.input_table').val();
            $('.input_table').val(input+'{F}');
        }

        else if(inpt == 6){
            txt = $('.text-preview').html();
            $('.text-preview').html(txt+'∨');

            input = $('.input_table').val();
            $('.input_table').val(input+'{V}');
        }

        else if(inpt == 7){
            txt = $('.text-preview').html();
            $('.text-preview').html(txt+'∧');

            input = $('.input_table').val();
            $('.input_table').val(input+'{^}');
        }

        else if(inpt == 8){
            txt = $('.text-preview').html();
            $('.text-preview').html(txt+'¬');

            input = $('.input_table').val();
            $('.input_table').val(input+'{-}');
        }

        else if(inpt == 9){
            txt = $('.text-preview').html();
            $('.text-preview').html(txt+'(');

            input = $('.input_table').val();
            $('.input_table').val(input+'{(}');
        }

        else if(inpt == 0){
            txt = $('.text-preview').html();
            $('.text-preview').html(txt+')');

            input = $('.input_table').val();
            $('.input_table').val(input+'{)}');
        }
    }

    $(document).ready(function(){
        $('.input_table').val('');
    });
 </script>

@endsection
