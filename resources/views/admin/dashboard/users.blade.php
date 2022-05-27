@extends('admin.layout.partials')
@section('content')
@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
<br>
            <div class="content">
                <div class="container">

                    <br>
                    <div class="page-title">
                        <h3>المستخدمون
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الاسم</th>
                                        <th scope="col"> البريد الالكتروني </th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)

                                    <tr>
                                        <th scope="row"> {{$loop->index + 1}}  </th>
                                        <th scope="row"> {{$user->name}}</th>

                                        <td>  {{$user->email}}   </td>
                                        <td>
                                            <a href="{{route('dashboard.users.destroy',$user->id)}}" class="btn btn-danger">حذف</a>

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
