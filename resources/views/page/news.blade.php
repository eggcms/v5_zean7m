@extends('layouts.main')

@section('title')
    {{$news->title}}
@endsection

@section('description')
    {{ $news->description }}
@endsection

@section('content')

<div id="title">
    <div class="container py-2 bg-con">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h3>ข่าวกีฬาวันนี้</h3>
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
                    <i class="fas fa-home" aria-hidden="true"></i> <a href="{{ url('/') }}">หน้าแรก</a>
                    <i class="fas fa-angle-right text-danger" aria-hidden="true"></i> <a href="{{ url('/allnews') }}">ข่าวกีฬาวันนี้</a>
                    <i class="fas fa-angle-right text-danger" aria-hidden="true"></i> <span>{{ $news->title }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="all-vicrow">
    <div class="container bg-con">
        <div class="row">
            <div class="col-12">

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="content-vc text-light">
                            <div class="py-2">
                                <img src="{{ serv_url('imgs/'.$news->image) }}" alt="{{ $news->title }}">
                            </div>
                            <b class="text-warning">{{ $news->description }}</b>
                            {!! $news->content !!}
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div id="sidebar-scroll">
                            @include('component.lineform')
                            <div class="sidebar">
                                <img src="/images/P-ชวนเพื่อน.png" alt="">
                                <div id="title">
                                    <div class="container py-2 bg-con">
                                        <div class="row">
                                            <div class="col-12 px-0">
                                                <div class="title">
                                                    <h3>เรื่องน่าสนใจ</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-news3 pb-3">
                                @if($news_update)
                                    @foreach($news_update as $nu)
                                        <a href="{{ url('news/'.$nu->id) }}"><p><i class="fas fa-angle-double-right text-danger pt-1"></i> {{ $nu->title }}</p></a>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
