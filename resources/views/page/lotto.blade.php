@extends('layouts.main')

@section('title')
    {{$lotto->title ?? ''}}
@endsection

@section('description')
    {{ $lotto->description ?? '' }}
@endsection

@section('content')

<div id="title">
    <div class="container py-2 bg-con">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h3>ตรวจสลากกินแบ่งรัฐบาล งวดวันที่ {{ $lotto->lotto_at ?? '...' }}</h3>
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
                    {{--  <i class="fas fa-angle-right text-danger" aria-hidden="true"></i> <a href="{{ url('/allnews') }}">ข่าวกีฬาวันนี้</a>  --}}
                    <i class="fas fa-angle-right text-danger" aria-hidden="true"></i> <span>ตรวจสลากกินแบ่งรัฐบาล งวดวันที่ {{ $lotto->title ?? '...' }}</span>
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
                            <div class="my-2 p-3 border check-lotto bg-egg rounded">
                                <h3 class="text-center text-dark">ตรวจสลากกินแบ่งรัฐบาล</h3>
                                <form action="#">
                                    <div class="form-group">
                                        <p class="text-center text-dark">งวดวันที่</p>
                                        <select name="lotto_at" class="form-control">
                                        <option value="lotto_id">1-03-2020</option>
                                        <option value="lotto_id">16-03-2020</option>
                                        <option value="lotto_id">1-04-2020</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="ur_lotto" class="form-control" placeholder="กรอกเลชสลาก">
                                    </div>
                                    <div id="res" class="form-group text-success bg-light py-2 px-3 rounded text-center">รอผลสลากกินแบ่ง</div>
                                    <button type="submit" class="btn btn-danger form-control">ตรวจสลากฯ ของคุณ</button>
                                </form>
                            </div>
                            <div class="lotto_result py-3 col bg-egg text-dark">
                                <div class="row">
                                    <div class="col">
                                        <h1 class="text-center">ผลสลากกินแบ่งรัฐบาล</h1>
                                        <p class="text-center text-dark">งวดวันที่ 1 มีนาคม 2563</p>
                                        <h3 class="text-center">รางวัลที่ 1 รางวัลละ 6,000,000 บาท</h3>
                                        <div class="col text-center">xxxxxx</div>
                                    </div>


                                {{--  <h3 class="text-center">ผลสลากกินแบ่งรัฐบาล รางวัลที่ 2 มี 5 รางวัลๆละ 200,000 บาท</h3>
                                
                                    <div class="col-2 offset-1 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                

                                <h3 class="text-center">ผลสลากกินแบ่งรัฐบาล รางวัลที่ 3 มี 10 รางวัลๆละ 80,000 บาท</h3>

                                    <div class="col-2 offset-1 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                
                                <h3 class="text-center">ผลสลากกินแบ่งรัฐบาล รางวัลที่ 4 มี 50 รางวัลๆละ 40,000 บาท</h3>

                                    <div class="col-2 offset-1 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>

                                

                                <h3 class="text-center">ผลสลากกินแบ่งรัฐบาล รางวัลที่ 5 มี 100 รางวัลๆละ 20,000 บาท</h3>

                                    <div class="col-2 offset-1 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>
                                    <div class="col-2 text-center">xxxxxx xxxxxx xxxxxx xxxxxx xxxxxx</div>  --}}
                                </div>
                            </div>
                            {{--  <div class="py-2">
                                <img src="{{ serv_url('imgs/'.$news->image) }}" alt="{{ $news->title }}">
                            </div>
                            <b class="text-warning">{{ $news->description }}</b>
                            {!! $news->content !!}  --}}
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
                                {{--  @if($news_update)
                                    @foreach($news_update as $nu)
                                        <a href="{{ url('news/'.$nu->id) }}"><p><i class="fas fa-angle-double-right text-danger pt-1"></i> {{ $nu->title }}</p></a>
                                    @endforeach
                                @endif  --}}
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
