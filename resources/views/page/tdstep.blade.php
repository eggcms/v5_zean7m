@extends('layouts.main')

@section('title')
@if($meta_title)
    {{$meta_title}}
@else
	ทีเด็ดคลับดอทคอม ราคาบอลเดี่ยว
@endif
@endsection

@section('description')
@if($meta_description)
    {{ $meta_description }}
@else
	ทีเด็ดคลับดอทคอม ข้อมูลการวิเคราะห์ ทีเด็ดบอลเดี่ยว ประจำวัน
@endif
@endsection

@section('content')
<div id="title">
    <div class="container py-2 bg-con">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h3>ทีเด็ดบอลเดี่ยว</h3>
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
                    <i class="fas fa-angle-right" aria-hidden="true"></i> <span>ทีเด็ดบอลเดี่ยว</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="youtube">
    <div class="container bg-con pt-2 pb-3">
        <div class="row">
            <div class="col">
                <div class="row">
                @if($youtube)
                    @foreach($youtube as $y)
                    <div class="col-12 col-lg-6 mb-2 ">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="1903" height="768" src="{{$y->clip}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="api-tded">
    <div class="container bg-con">
        <div class="row">
            <div class="col-12">
                <div class="api py-3">
                    <h3 style="font-size:20px; margin: 10px 0 5px 0; color:#eeeeee;">ราคาบอลเด็ด ทรรศนะบอลเด็ด, ฟันธงบอลเด็ด</h3>
                    {{ballstep($objs)}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="benner-1">
    <div class="container bg-con">
        <div class="row">
            <div class="col-12 py-3">
                <a href="https://www.mm88zean.com" target="_blank">
                    <img src="/images/bn-1.gif" alt="">
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
