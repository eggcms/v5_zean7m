@extends('layouts.main')
@section('title')
    {{$meta_title ?? 'เซียน7เอ็มดอทคอม ตรวจสลากกินแบ่งรัฐบาล งวดวันที่ '.$lotto_at.' เว็บดูบอลบสด ศูนย์รวมข่าวสารวงการบอล จากลีกดังทั่วโลก'}}
@endsection
@section('description')
    {{$meta_description ?? 'เซียน7เอ็มดอทคอม ตรวจสลากกินแบ่งรัฐบาล งวดวันที่ '.$lotto_at.' เว็บดูบอลบสด ศูนย์รวมข่าวสารวงการบอล จากลีกดังทั่วโลก เที่ยงตรง กระชับ ฉับไว'}}
@endsection

@section('content')
<div id="title">
    <div class="container py-2 bg-con">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h3>ตรวจสลากกินแบ่งรัฐบาล งวดวันที่ {{ $lotto_at ?? '...' }}</h3>
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
                    <i class="fas fa-angle-right text-danger" aria-hidden="true"></i> <span>ตรวจสลากกินแบ่งรัฐบาล งวดวันที่ {{ $lotto_at ?? '...' }}</span>
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
                            @if($reason!='none')
                            <div class="my-2 p-3 lotto_checked bg-warning rounded">
                                <h1 class="text-center text-danger">ผลการตรวจสลากกินแบ่งรัฐบาล</h1>
                                <p class="text-dark text-center">เลขสลาก: {{ $mylotto }}</p>
                                <h3 class="text-center rounded text-light py-3 bg-danger">{{ $reason }}</h3>
                            </div>
                            @endif
                            <div class="my-2 p-3 border check-lotto bg-egg rounded">
                                <h3 class="text-center text-dark">ตรวจสลากกินแบ่งรัฐบาล</h3>
                                <form action="/lotto" method="post">
                                    <div class="form-group text-center">
                                        <input type="type" name="ur_lotto" class="form-control text-center" placeholder="กรอกเลขสลาก" maxlength="6" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required>
                                    </div>
                                    {{-- <div id="result" class="form-group text-success bg-light py-2 px-3 rounded text-center">รอผลสลากกินแบ่ง</div> --}}
                                    <button type="submit" class="btn btn-danger form-control">ตรวจสลากฯ ของคุณ</button>
                                    @csrf
                                </form>
                            </div>
                            <div class="lotto_result py-3 col bg-egg text-dark">
                                <div class="row">
                                    <div class="col-12 py-3 border-bottom">
                                        <h1 class="text-center text-danger">ผลสลากกินแบ่งรัฐบาล</h1>
                                        <p class="text-center text-dark">งวดวันที่ {{$lotto_at}}</p>
                                        <h3 class="text-center text-danger">รางวัลที่ 1 รางวัลละ 6,000,000 บาท</h3>
                                        <div class="col-12 text-center">{{$lotto->lotto1}}</div>
                                    </div>
                                    <div class="col-12 py-3 border-bottom">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <h3 class="text-center text-danger">รางวัลข้างเคียงรางวัลที่ 1</h3>
                                                <p class="text-dark">{!! str_replace(' ',' &nbsp; &nbsp; ',$lotto->lotto1closeup) !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 py-3 border-bottom">
                                        <div class="row">
                                            <div class="col-4 text-center"><h3 class="text-center text-danger">เลขหน้า 3 ตัว</h3><p class="text-dark">{{$lotto->lotto_front3}}</p></div>
                                            <div class="col-4 text-center"><h3 class="text-center text-danger">เลขท้าย 3 ตัว</h3><p class="text-dark">{{$lotto->lotto_last3}}</p></div>
                                            <div class="col-4 text-center"><h3 class="text-center text-danger">เลขท้าย 2 ตัว</h3><p class="text-dark">{{$lotto->lotto_last2}}</p></div>
                                        </div>
                                    </div>

                                    <div class="col-12 py-3 border-bottom">
                                        <h3 class="text-center text-danger">ผลสลากกินแบ่งรัฐบาล รางวัลที่ 2 มี 5 รางวัลๆละ 200,000 บาท</h3>
                                        <div class="row">
                                            @for($i = 0; $i < 5; $i++)
                                                @if($i == 0) 
                                                <div class="col-2 offset-1">{{$lotto2[$i]}}</div>
                                                @else 
                                                <div class="col-2">{{$lotto2[$i]}}</div>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>

                                    <div class="col-12 py-3 border-bottom">
                                        <h3 class="text-center text-danger">ผลสลากกินแบ่งรัฐบาล รางวัลที่ 3 มี 10 รางวัลๆละ 80,000 บาท</h3>
                                        <div class="row">
                                            @for($i = 0; $i < 10; $i++)
                                                @if(($i%5) == 0) 
                                                <div class="col-2 offset-1">{{$lotto3[$i]}}</div>
                                                @else 
                                                <div class="col-2">{{$lotto3[$i]}}</div>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>

                                    <div class="col-12 py-3 border-bottom">
                                        <h3 class="text-center text-danger">ผลสลากกินแบ่งรัฐบาล รางวัลที่ 4 มี 50 รางวัลๆละ 40,000 บาท</h3>
                                        <div class="row">
                                            @for($i = 0; $i < 50; $i++)
                                                @if(($i%5) == 0)
                                                <div class="col-2 offset-1">{{$lotto4[$i]}}</div>
                                                @else 
                                                <div class="col-2">{{$lotto4[$i]}}</div>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>

                                    <div class="col-12 py-3">
                                        <h3 class="text-center text-danger">ผลสลากกินแบ่งรัฐบาล รางวัลที่ 5 มี 100 รางวัลๆละ 20,000 บาท</h3>
                                        <div class="row">
                                            @for($i = 0; $i < 100; $i++)
                                                @if(($i%5) == 0)
                                                <div class="col-2 offset-1">{{$lotto5[$i]}}</div>
                                                @else
                                                <div class="col-2">{{$lotto5[$i]}}</div>
                                                @endif
                                                    
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="bg-danger text-light p-3">
                                        <p>
                                            *** หากท่านใดตรวจผลสลากกินแบ่งรัฐบาล เเล้วถูกรางวัลสลากกินแบ่งรัฐบาล กรุณาตรวจเช็คตัวเลขสลากกินแบ่งที่กองสลากอีกครั้งนะคะ เพื่อความถูกต้อง
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div id="sidebar-scroll">

                            <div class="sidebar">
                                <div class="lao_lotto rounded mt-2 mb-3 p-3">
                                    <h1 class="text-center">หวยลาว</h1>
                                    <h2 class="text-center text-danger"> ກວດຜົນຫວຍລາວ</h2>
                                    <h2 class="text-center">งวดวันที่ {{ $lotto_lao_at }}</h2>
                                    <h3 class="text-center">{{ $lotto_lao }}</h3>
                                </div>
                                @include('component.lineform')
                                <img src="{{url('/images/invite.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
