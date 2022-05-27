




@extends('front.partials')
@section('content')



    <main id="main">



        <!-- ======= Latest Properties Section ======= -->
        <section class="section-property section-t8">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="title-box-d section-t4">
                            <h3 class="title-d"> اخر العقارات </h3>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="row">




                        </div>
                    </div>
                </div>

                <div id="property-carousel" class="swiper">
                    <div class="swiper-wrapper">

                        @foreach ($latest_reales as $item)

                        <div class="carousel-item-b swiper-slide">
                            <div class="card-box-a card-shadow">
                                <div class="img-box-a">
                                   <img style="width:527px; height:400px"       @if (count($item->images)>0) src="{{asset('uploads/'.$item->images[0]->path)}}"      @endif width="527px" height="485px" alt="" class="img-a img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-overlay-a-content">
                                        <div class="card-header-a">
                                            <h4 class="card-title-a">
                                                <a href="{{route('real.show',$item->slug)}}"> {{$item->title}} </a>
                                            </h4>
                                        </div>
                                        <div class="card-body-a">
                                            <div class="price-box d-flex">
                                                <span class="price-a">السعر | {{$item->price}} {{$item->currency}} .</span>
                                            </div>
                                            <a href="{{route('real.show',$item->slug)}}" class="link-a">عرض التفاصيل <span class="bi bi-chevron-left"></span></a>
                                        </div>
                                        <div class="card-footer-a">
                                            <ul class="card-info d-flex justify-content-around">
                                                <li>
                                                    <h4 class="card-info-title">الموقع</h4>
                                                    <span>{{$item->address}} </span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">المساحة</h4>
                                                    <span>{{$item->space}} متر </span>
                                                </li>

                                                <li>
                                                    <h4 class="card-info-title">صاحب العقار</h4>
                                                    <span>{{$item->user->name}} </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- End carousel item -->





                    </div>
                </div>

            </div>
        </section>












        <!-- ======= Agents Section ======= -->
        <section class="section-agents section-t8">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-box-d section-t4">
                            <h3 class="title-d"> عقارات أخرى : </h3>
                        </div>
                    </div>
                </div>
                <div class="row">



                    @foreach ($reales as $item)

                    <div class="col-md-4 mb-2">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">

                                <img style="width:527px; height:400px" @if (count($item->images)>0) src="{{asset('uploads/'.$item->images[0]->path)}}" @endif width="527px" height="485px" alt="" class="img-a img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h4 class="card-title-a">
                                            <a href="{{route('real.show',$item->slug)}}"> {{$item->title}} </a>
                                        </h4>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a">السعر | {{$item->price}} {{$item->currency}} .</span>
                                        </div>
                                        <a href="{{route('real.show',$item->slug)}}" class="link-a">عرض التفاصيل <span class="bi bi-chevron-left"></span></a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                                <h4 class="card-info-title">الموقع</h4>
                                                <span>{{$item->address}} </span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">المساحة</h4>
                                                <span>{{$item->space}} متر </span>
                                            </li>

                                            <li>
                                                <h4 class="card-info-title">صاحب العقار</h4>
                                                <span>{{$item->user->name}} </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@endforeach


                </div>
            </div>
        </section>

<div class="container mx-auto">
           {{$reales->links()}}
</div>












    </main>
    <!-- End #main -->

  @endsection
