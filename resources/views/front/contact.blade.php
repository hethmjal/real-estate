





@extends('front.partials')
@section('content')
@if (session('success'))
<div class="mt-5 title-single alert alert-success">{{session('success')}}</div>
@endif
    <main id="main">

        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single"> تواصل معنا</h1>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Intro Single-->

        <!-- ======= Contact Single ======= -->
        <section class="">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 section-t8">
                        <div class="row">
                            <div class="col-md-7">
                                <form action="{{route('contactus.store')}}" method="post" role="form" class="">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control form-control form-control-a" placeholder="الاسم " required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input name="email" type="email" class="form-control form-control form-control-a" placeholder="البريد الالكتروني " >
                                            </div>
                                        </div>
                                        <div class="col-md-12  mb-3">
                                            <div class="form-group">
                                                <input name="phone" type="tel" class="form-control form-control form-control-a" placeholder=" رقم ا لهاتف " >
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" name="message" cols="45" rows="8" placeholder="الرسالة" required></textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-a">ارسال </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Single-->

    </main>
    <!-- End #main -->
@endsection
