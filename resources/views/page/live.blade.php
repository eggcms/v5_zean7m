@extends('layouts.main')

@section('content')
<div id="title">
    <div class="container py-2 bg-con">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h3>ดูบอลสด</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page">
    <div class="container bg-con">
        <div class="row">
            <div class="col-12 mb-2">
                <div class="page-1">
                    <i class="fas fa-home" aria-hidden="true"></i> <a href="{{url('/')}}">หน้าแรก</a>
                    <i class="fas fa-angle-right text-danger" aria-hidden="true"></i> <span>ดูบอลสด</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="live">
    <div class="container bg-con">
        <div class="row">
            <div class="col-12 my-2">
                <div id="livePlayer"></div>
            </div>
            <div class="col-12">
                {{ ball_table() }}
            </div>
        </div>
    </div>
</div>
<div class="listChannel container bg-con">
    <div class="row">
        @php
        $dir = public_path('images/channel/*.png');
        $images = glob($dir);
        foreach($images as $image):
        $total = explode("channel/",$image);
        $name=explode(".",$total[1]);
        echo "
        <div class='col-3 col-sm-2 col-lg-2 col-xl-1 mb-2'>
            <a href='#'".$name[0]."' onclick='return changeChannel(\"".$name[0]."\");'>
                <img src='images/channel/".$name[0].".png' class='img-fluid'>
            </a>
        </div>";
            
        endforeach;
        @endphp
    </div>
</div>
<a href="#" class="btnDoball" onclick="return changeChannel('bein2');">รับชม</a>
@endsection
