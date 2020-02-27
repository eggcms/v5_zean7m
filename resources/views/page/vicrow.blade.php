@extends('layouts.main')
@section('title')
    {{$vicrow->title}}
@endsection

@section('description')
    {{$vicrow->description}}
@endsection

@section('content')

<div id="title">
    <div class="container py-2 bg-con">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h3>วิเคราะห์บอลวันนี้</h3>
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
                    <i class="fas fa-angle-right text-danger" aria-hidden="true"></i> <a href="{{ url('/allanalyze') }}">วิเคราะห์บอล</a>
                    <i class="fas fa-angle-right text-danger" aria-hidden="true"></i> <span>{{ $vicrow->title }}</span>
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
                                <img src="{{ serv_url('imgs/'.$vicrow->image) }}" alt="{{ $vicrow->title }}">
                            </div>
                            <b class="text-warning">{{ $vicrow->description }}</b>
                            {!! $vicrow->content !!}
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div id="sidebar-scroll">
                            @include('component.lineform')
                            <div class="sidebar">
                                <a href='https://www.mm88zean.com' alt="www.mm88zean.com" target="_blank">
                                    <img src="/images/P-ชวนเพื่อน.png" alt="">
                                </a>
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
                                @if($vicrow_update)
                                    @foreach($vicrow_update as $vu)
                                        <a href="{{ url('analyze/'.$vu->id) }}"><p><i class="fas fa-angle-double-right text-danger pt-1"></i> {{ $vu->title }}</p></a>
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
