@extends('admin.layout.partials')
@section('content')
@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
<br>
            <div class="content">
                <div class="container">
                    <div>
                        <a class="btn btn-primary" href="{{route('dashboard.reales.add')}}">اضافة عقار</a>
                    </div>
                    <br>
                    <div class="page-title">
                        <h3>العقارات
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الصورة</th>

                                        <th scope="col"> العنوان </th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reales as $item)

                                    <tr>
                                        <th scope="row"> {{$loop->index + 1}}  </th>
                                        <th scope="row"> <img width="100px" height="100px" @if (count($item->images) > 0) src="{{asset('uploads/'.$item->images[0]->path)}}"   @endif alt=""> </th>

                                        <td>  {{$item->title}}   </td>
                                        <td>
                                            <a href="{{route('real.show',$item->slug)}}" class="btn btn-success">عرض العقار</a>
                                            <a href="{{route('dashboard.reales.edit',$item->slug)}}" class="btn btn-primary">تعديل</a>
                                            <a href="{{route('dashboard.reales.destroy',$item->slug)}}" class="btn btn-danger">حذف</a>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
