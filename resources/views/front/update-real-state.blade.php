




@extends('front.partials')
@section('content')


    <main id="main">

        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">

                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single"> اضافة عقار</h1>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Intro Single-->

        <!-- ======= Contact Single ======= -->
        <section class="contact">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 section-t8">
                        <div class="row">
                            <div class="col-md-7">
                                <form action="{{route('real.update',$real->slug)}}" method="post" role="form" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="" class="form-label text-primary fw-bold"> <span class="fw-bold text-danger">تنبيه ! الحقول المعلمة ب (*) الزامية </span> </label>

                                        </div>



                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label text-primary fw-bold">العنوان <span class="fw-bold text-danger">* </span> </label>
                                                <input type="text" name="title" value="{{$real->title}}" class="form-control form-control-lg form-control-a" placeholder=" " required >
                                                @error('title')
                                                <p class="invalid-feedback d-block"> {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>




                                        <div class="col-md-12  mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">صور العقار </label>
                                                <input name="images[]" id="upload_file" type="file" multiple class="form-control form-control-lg form-control-a" onchange="preview_image();" >
                                                @error('images')
                                                <p class="invalid-feedback d-block"> {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div id="image_preview"></div>

                                        <div class="col-md-12  mb-3">
                                            <div class="row">
                                                @foreach ($real->images as $image)
                                                <div class="image{{$image->id}} position-relative col-md-2">
                                                    <input type="hidden" class="image_id" value="{{$image->id}}">

                                                    <button type="button" class="delete position-absolute  btn btn-sm btn-danger">
                                                        <i class="bi bi-x-circle " aria-hidden="true"></i>
                                                    </button>
                                                    <img src="{{asset('uploads/'.$image->path)}}"  width="80px" height="80px">
                                                </div>

                                                @endforeach

                                            </div>
                                        </div>











                                        <div class="col-md-12  mb-3">
                                            <div class="">
                                                <label for="" class="form-label form-group  text-primary fw-bold">القسم <span class="fw-bold text-danger">* </span> </label>
                                                <select class="custom-select" name="category_id">
                                                    <option value="">اختيار قسم</option>
                                                    @foreach ($categories as $category)
                                                    {{$selected = ''}}
                                                    @if( $category->id == $real->category_id )
                                                      {{$selected = 'selected="selected"'}}
                                                    @endif
                                                    <option value="{{$category->id}}"  {{$selected}}> {{$category->category}}</option>
                                                    @endforeach

                                                  </select>
                                                  @error('category_id')
                                                <p class="invalid-feedback d-block"> {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12  mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">المدينة <span class="fw-bold text-danger">* </span></label>
                                                <input name="city" type="text" value="{{$real->city}}" class="form-control form-control-lg form-control-a" placeholder=" المدينة " >
                                                @error('city')
                                                <p class="invalid-feedback d-block"> {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12  mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">عنوان السكن او البيع بالتفصيل <span class="fw-bold text-danger">* </span></label>
                                                <input name="address" type="text" value="{{$real->address}}" class="form-control form-control-lg form-control-a" placeholder=" العنوان بتفصيل أكبر " >
                                                @error('address')
                                                <p class="invalid-feedback d-block"> {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">السعر </label>
                                                <input type="number" min="0" name="price" value="{{$real->price}}" class="form-control form-control-lg form-control-a" placeholder="السعر " >
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">العملة </label>
                                                <input name="currency" type="text" value="{{$real->currency}}" class="form-control form-control-lg form-control-a" placeholder="العملة  " >
                                            </div>
                                        </div>

                                        <div class="col-md-12  mb-3">
                                            <div class="form-group ">
                                                <label for="" class="form-label  text-primary fw-bold">  المساحة بالمتر </label>
                                                <input name="space" type="number" min="1" value="{{$real->space}}" class="form-control form-control-lg form-control-a" placeholder=" المساحة " >

                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">غرف النوم </label>
                                                <input type="number" min="0" name="bedrooms" value="{{$real->bedrooms}}" class="form-control form-control-lg form-control-a" placeholder=" " >
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">الواجهة </label>
                                                <input name="interface" type="text" value="{{$real->interface}}" class="form-control form-control-lg form-control-a" placeholder="  " >
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">الصالات </label>
                                                <input type="number" min="0" name="halls" value="{{$real->halls}}" class="form-control form-control-lg form-control-a" placeholder=" " >
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">دورات المياه </label>
                                                <input name="bathrooms" type="number" value="{{$real->bathrooms}}" class="form-control form-control-lg form-control-a" placeholder="  " >
                                            </div>
                                        </div>


                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">عرض الشارع </label>
                                                <input name="street_width" type="number" value="{{$real->street_width}}" class="form-control form-control-lg form-control-a" placeholder="  " >
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">الدور </label>
                                                <input type="number" min="0" name="floor" value="{{$real->floor}}" class="form-control form-control-lg form-control-a" placeholder=" " >
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">عمر العقار </label>
                                                <input type="number" min="0" name="age" value="{{$real->age}}" class="form-control form-control-lg form-control-a" placeholder=" " >
                                            </div>
                                        </div>




                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <input class="form-check-input" name="kitchen"  type="checkbox" @if ($real->kitchen == 'true') checked @endif value="true" id="kitchen">
                                                <label class="form-check-label" style="font-size: 20px;  font-weight: bold; " for="kitchen">
                                                  مطبخ
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">

                                                <input class="form-check-input" name="elevator" type="checkbox" @if ($real->elevator == 'true') checked @endif value="true" id="elevator">
                                                <label class="form-check-label"   style="font-size: 20px;  font-weight: bold; " for="elevator">
                                                  مصعد
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <input class="form-check-input" name="car" type="checkbox" @if ($real->car == 'true') checked @endif value="true" id="car">
                                                <label class="form-check-label "  style="font-size: 20px;  font-weight: bold; " for="car">
                                                  مدخل سيارة
                                                </label>

                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">رقم الهاتف للتواصل <span class="fw-bold text-danger">* </span> </label>
                                                <input type="tel" name="phone" value="{{$real->phone}}" class="form-control form-control-lg form-control-a" placeholder=" " >
                                                @error('phone')
                                                <p class="invalid-feedback d-block"> {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">
                                 <i class="bi bi-facebook" aria-hidden="true"></i>
                                                حساب فيسبوك  </label>
                                                <input name="facebook" type="text" value="{{$real->facebook}}" class="form-control form-control-lg form-control-a" placeholder="  ">
                                            </div>
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <input type="submit" class="btn btn-b btn-success" value="تعديل">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-5 section-md-t3">



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Single-->

    </main>

    @push('js')

    <script>

        $(".delete").click(function(e) {

            e.preventDefault();
            $id =$(this).parent().find(".image_id").val();
            console.log($id);
            $.ajax({
                type: "GET",
                url: "{{ route('real.destroyImage') }}",
                data: {
                    id: $(this).parent().find(".image_id").val(), // < note use of 'this' here
                },
                success: function(result) {
                   // alert('ok');
                    console.log(result);
                    $(".image"+result.id).hide();
                },
                error: function(result) {
                  //  alert('error');
                }
            });
        });

        </script>
        <script>
            $(document).ready(function()
            {

            });

            function preview_image()
            {
             var total_file=document.getElementById("upload_file").files.length;
             for(var i=0;i<total_file;i++)
             {
              $('#image_preview').append("<img class='ml-2' height='75px' width='75px' src='"+URL.createObjectURL(event.target.files[i])+"'>");
             }
            }
            </script>
    @endpush
    @endsection
