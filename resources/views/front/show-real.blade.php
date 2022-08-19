




@extends('front.partials')
@section('content')

    <main id="main">

        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single"> {{$real->title}}  </h1>
                            <span class="text-danger color-text-a bi bi-geo-alt"> العنوان: {{$real->address}}  </span>
                            <br>
                            <span class="text-danger color-text-a bi bi-alarm">  {{$real->created_at->diffForHumans()}}   </span>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Intro Single-->

        <!-- ======= Property Single ======= -->
        <section class="property-single nav-arrow-b">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div id="property-single-carousel" class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($real->images as $image)
                                <div class="carousel-item-b swiper-slide">
                                    <img width="800px" height="600px" src="{{asset('uploads/'.$image->path)}}" alt="">
                                </div>
                                @endforeach


                            </div>
                        </div>
                        <div class="property-single-carousel-pagination carousel-pagination"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">

                        <div class="row justify-content-between">
                            <div class="col-md-5 col-lg-4">

                                <div class="property-summary">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="title-box-d section-t4">
                                                <h3 class="title-d"> تفاصيل العقار </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="summary-list">
                                        <ul class="list">
                                            <li class="d-flex justify-content-between">
                                                <strong>العنوان :</strong>
                                                <span>{{$real->address}}</span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>السعر :</strong>
                                                <span> {{$real->price}} {{$real->currency}}  </span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong> المساحة :</strong>
                                                <span> {{$real->space}} متر</span>
                                            </li>

                                            <li class="d-flex justify-content-between">
                                                <strong>صاحب العقار :</strong>
                                                <span> {{$real->user->name}}
                                            </span>
                                            </li>

                                            <li class="d-flex justify-content-between">
                                                <strong> رقم الهاتف :</strong>
                                                <span> {{$real->phone}} </span>
                                            </li>

                                            <li class="d-flex justify-content-between">
                                                <strong> حساب فيسبوك (الرابط) :</strong>
                                               <a target="blank" href="{{$real->facebook}}"> <i class="bi bi-facebook" style="color: blue"> </i></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-7 section-md-t3" style="margin-top: 50px">


                                @if ($real->category->category != "أراضي للبيع" && $real->category->category != "أراضي للايجار")

                                <div class="summary-list  w-50">
                                    <table class="table table-striped ">
                                        @if ($real->interface)
                                        <tr class=" ">
                                            <td>الواجهة :</td>
                                            <td class="text-start">{{$real->interface}}</td>
                                        </tr>
                                        @endif

                                        @if ($real->bedrooms)
                                        <tr class=" ">
                                            <td>غرف النوم :</td>
                                            <td class="text-start"> {{$real->bedrooms}} </td>
                                        </tr>
                                        @endif

                                        @if ($real->halls)
                                        <tr class="">
                                            <td> الصالات :</td>
                                            <td class="text-start"> {{$real->halls}} </td>
                                        </tr>
                                        @endif

                                        @if ($real->bathrooms)
                                        <tr class="">
                                            <td> دورات المياه :</td>
                                            <td class="text-start"> {{$real->bathrooms}}
                                        </td>
                                        </tr>
                                        @endif

                                        @if ($real->street_width)
                                        <tr class="">
                                            <td> عرض الشارع :</td>
                                            <td class="text-start"> {{$real->street_width}} متر </td>
                                        </tr>

                                        @endif

                                        @if ($real->floor)

                                        <tr class="">
                                            <td> الدور :</td>
                                            <td class="text-start"> {{$real->floor}}
                                        </td>
                                        </tr>
                                        @endif

                                        @if ($real->interface)

                                        <tr class="">
                                            <td> عمر العقار :</td>
                                            <td class="text-start"> {{$real->age}} </td>
                                        </tr>
                                        @endif

                                        @if ($real->kitchen)
                                        <tr class="">
                                            <td>  مطبخ :</td>
                                            <td class="text-start"><i class="bi bi-check-circle-fill text-success"></i>
                                            </td>
                                        </tr>
                                        @else
                                        <tr class="">
                                            <td>  مطبخ :</td>
                                            <td class="text-start"><i class="bi bi-x-circle-fill text-danger"></i>

                                            </td>
                                        </tr>

                                        @endif

                                        @if ($real->elevator)
                                        <tr class="">
                                            <td>  مصعد :</td>
                                            <td class="text-start"><i class="bi bi-check-circle-fill text-success"></i>
                                            </td>
                                        </tr>
                                        @else
                                         <tr class="">
                                            <td>  مصعد :</td>
                                            <td class="text-start"><i class="bi bi-x-circle-fill text-danger"></i>
                                            </td>
                                        </tr>
                                        @endif

                                        @if ($real->car)
                                        <tr class="">
                                            <td>  مدخل سيارة :</td>
                                            <td class="text-start"><i class="bi bi-check-circle-fill text-success"></i>
                                            </td>
                                        </tr>
                                        @else
                                        <tr class="">
                                            <td>  مدخل سيارة :</td>
                                            <td class="text-start"><i class="bi bi-x-circle-fill text-danger"></i>
                                            </td>
                                        </tr>
                                        @endif








                                    </table>

                                </div>
                                @endif


  </div>


                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- End Property Single-->

    </main>
    <!-- End #main -->
    @endsection
