@extends('layouts.main')
@section('title')
    {{$meta_title}}
@endsection

@section('description')
    {{ $meta_description }}
@endsection
@section('content')

<div id="title">
    <div class="container py-2 bg-con">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h3>ข่าวฟุตบอลทั้งหมด</h3>
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
                    <i class="fas fa-angle-right text-danger" aria-hidden="true"></i> <span>ข่าวฟุตบอลทั้งหมด</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="all-news2">
    <div class="container bg-con">
        <div class="row">
            <div class="col-12">
                <div class="row">
                @if($allnews)
                    @foreach($allnews as $news)
                    <div class="col-6 col-lg-3">
                        <div class="list-news2">
                            <a href="{{url('news/'.$news->id)}}">
                                <img src="{{serv_url('imgs/'.$news->image)}}" alt="{{$news->title}}">
                                <p>{{$news->title}}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="benner-1">
    <div class="container bg-con">
        <div class="row">
            <div class="col-12 py-2">
                <a href="https://www.mm88zean.com" target="_blank"><img src="/images/bn-1.gif" alt=""></a>
            </div>
        </div>
    </div>
</div>
@endsection
