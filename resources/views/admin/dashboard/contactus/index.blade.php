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
                        <h3>الرسائل الواردة
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col"></th>
                                    <th scope="col">{{__('الاسم')}}</th>
                                    <th scope="col"> {{__('البريد الالكتروني')}}</th>
                                    <th scope="col">{{__('الرسالة')}}</th>

                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $x =1; ?>
                                @foreach ($messages as $message)
                                <tr>
                                    <th scope="row"><?php  echo $x++; ?></th>

                                    <td>{{$message->name}}</td>
                                    <td>{{ $message->email}}</td>
                                    <td>   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#msg{{$message->id}}">
                                      عرض التفاصيل
                                      </button>

                                    </td>

                                    <td>   <a href="{{route('message.destroy',$message->id)}}" class="btn btn-danger" >
                                        حذف
                                        </a>

                                      </td>


                                  </tr>
                                  <div style="max-width: 1500px; width: 1500px; height: 1500px; max-height: 1500px" class="modal fade" id="msg{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="container">
                                            <div class="form-group">
                                                <span style="font-weight: 700" class="fw-bold">الاسم: </span>
                                                <span>{{$message->name}}</span>

                                            </div>


                                            <div class="form-group">
                                                <span style="font-weight: 700" class="fw-bold">الايميل: </span>
                                                <span>{{$message->email}}</span>

                                            </div>

                                            <div class="form-group">
                                                <span style="font-weight: 700" class="fw-bold">رقم الهاتف: </span>
                                                <span>{{$message->phone}}</span>

                                            </div>

                                            <div class="form-group">
                                                <span style="font-weight: 700" class="fw-bold">الرسالة: </span>
                                                <div style="max-width: 300px; width: 300px; height: 300px; max-height: 300px">  <p>{{$message->message}}</p> </div>

                                            </div>

                                          </div>

                                          </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>

                              </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        @push('js')


<script src="{{asset('/js/modalpopup.js')}}"></script>

@endpush
@endsection
