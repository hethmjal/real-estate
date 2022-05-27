




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
                                <form action="{{route('real.store')}}" method="post" role="form" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="" class="form-label text-primary fw-bold"> <span class="fw-bold text-danger">تنبيه ! الحقول المعلمة ب (*) الزامية </span> </label>

                                        </div>



                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label text-primary fw-bold">العنوان <span class="fw-bold text-danger">* </span> </label>
                                                <input type="text" name="title" value="{{old('title')}}" class="form-control form-control-lg form-control-a" placeholder=" " required >
                                                @error('title')
                                                <p class="invalid-feedback d-block"> {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-md-12  mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold"> التفاصيل <span class="fw-bold text-danger">* </span></label>
                                                <textarea name="description"  class="form-control"  cols="45" rows="8" placeholder="التفاصيل" >{{old('description')}}</textarea>
                                                @error('description')
                                                <p class="invalid-feedback d-block"> {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-12  mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">صور العقار </label>
                                                <input name="images[]"  id="upload_file"  type="file" multiple class="form-control form-control-lg form-control-a"  onchange="preview_image();" >
                                                @error('images')
                                                <p class="invalid-feedback d-block"> {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div id="image_preview"></div>


                                        <div class="col-md-12  mb-3">
                                            <div class="">
                                                <label for="" class="form-label form-group  text-primary fw-bold">القسم <span class="fw-bold text-danger">* </span> </label>
                                                <select class="custom-select" name="category_id">
                                                    <option value="">اختيار قسم</option>
                                                    @foreach ($categories as $category)

                                                    <option value="{{$category->id}}"> {{$category->category}}</option>
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
                                                <input name="city" type="text" value="{{old('city')}}" class="form-control form-control-lg form-control-a" placeholder=" المدينة " >
                                                @error('city')
                                                <p class="invalid-feedback d-block"> {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12  mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">عنوان السكن او البيع بالتفصيل <span class="fw-bold text-danger">* </span></label>
                                                <input name="address" type="text" value="{{old('address')}}" class="form-control form-control-lg form-control-a" placeholder=" العنوان بتفصيل أكبر " >
                                                @error('address')
                                                <p class="invalid-feedback d-block"> {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">السعر </label>
                                                <input type="number" min="0" name="price" value="{{old('price')}}" class="form-control form-control-lg form-control-a" placeholder="السعر " >
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">العملة </label>
                                                <input name="currency" type="text" value="{{old('currency')}}" class="form-control form-control-lg form-control-a" placeholder="العملة  " >
                                            </div>
                                        </div>

                                        <div class="col-md-12  mb-3">
                                            <div class="form-group ">
                                                <label for="" class="form-label  text-primary fw-bold">  المساحة بالمتر </label>
                                                <input name="space" type="number" min="1" value="{{old('space')}}" class="form-control form-control-lg form-control-a" placeholder=" المساحة " >

                                            </div>
                                        </div>



                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">غرف النوم </label>
                                                <input type="number" min="0" name="bedrooms" value="{{old('bedrooms')}}" class="form-control form-control-lg form-control-a" placeholder=" " >
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">الواجهة </label>
                                                <input name="interface" type="text" value="{{old('interface')}}" class="form-control form-control-lg form-control-a" placeholder="  " >
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">الصالات </label>
                                                <input type="number" min="0" name="halls" value="{{old('halls')}}" class="form-control form-control-lg form-control-a" placeholder=" " >
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">دورات المياه </label>
                                                <input name="bathrooms" type="number" value="{{old('bathrooms')}}" class="form-control form-control-lg form-control-a" placeholder="  " >
                                            </div>
                                        </div>


                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">عرض الشارع </label>
                                                <input name="street_width" type="number" value="{{old('street_width')}}" class="form-control form-control-lg form-control-a" placeholder="  " >
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">الدور </label>
                                                <input type="number" min="0" name="floor" value="{{old('floor')}}" class="form-control form-control-lg form-control-a" placeholder=" " >
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">عمر العقار </label>
                                                <input type="text" min="0" name="age" value="{{old('age')}}" class="form-control form-control-lg form-control-a" placeholder=" " >
                                            </div>
                                        </div>




                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <input class="form-check-input" name="kitchen" type="checkbox" value="true" id="kitchen">
                                                <label class="form-check-label" style="font-size: 20px;  font-weight: bold; " for="kitchen">
                                                  مطبخ
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">

                                                <input class="form-check-input" name="elevator" type="checkbox" value="true" id="elevator">
                                                <label class="form-check-label"   style="font-size: 20px;  font-weight: bold; " for="elevator">
                                                  مصعد
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <input class="form-check-input" name="car" type="checkbox" value="true" id="car">
                                                <label class="form-check-label "  style="font-size: 20px;  font-weight: bold; " for="car">
                                                  مدخل سيارة
                                                </label>

                                            </div>
                                        </div>




                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-label  text-primary fw-bold">رقم الهاتف للتواصل <span class="fw-bold text-danger">* </span> </label>
                                                <input type="tel" name="phone" value="{{old('phone')}}" class="form-control form-control-lg form-control-a" placeholder=" " >
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
                                                <input name="facebook" type="text" value="{{old('facebook')}}" class="form-control form-control-lg form-control-a" placeholder="  ">
                                            </div>
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <input type="submit"  class=" btn btn-success mx-2" style="font-size: 25px" value="اضافة">
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
