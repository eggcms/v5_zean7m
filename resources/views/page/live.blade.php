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
                <div id="myVideo"></div>
            </div>
            <div>
                {{ ball_table() }}
            </div>
        </div>
    </div>
</div>

@endsection
