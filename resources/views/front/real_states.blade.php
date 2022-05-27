@extends('front.partials')
@section('content')
@if (session('success'))
<div class="title-single alert alert-success">{{session('success')}}</div>
@endif

    <main id="main">

        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <a href="{{route('real.add')}}" class=" btn btn-success mx-2" style="background: #5393eb ;font-size: 20px" >اضافة عقار جديد</a>

                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single"> العقارات الخاصة بك</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Intro Single-->

        <!-- ======= Contact Single ======= -->
        <section class="contact">
            <div class="container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"> العنوان </th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reales as $item)

                        <tr>
                            <th scope="row"> {{$loop->index + 1}}  </th>
                            <td>  {{$item->title}}   </td>
                            <td>
                                <a href="{{route('real.show',$item->slug)}}" class="btn btn-success">عرض العقار</a>
                                <a href="{{route('real.edit',$item->slug)}}" class="btn btn-primary">تعديل</a>
                                <a href="{{route('real.destroy',$item->slug)}}" class="btn btn-danger">حذف</a>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>
        <!-- End Contact Single-->

    </main>
    <!-- End #main -->
    @endsection
