@extends('front.partials')
@section('content')
    <main id="main m-auto">
        <section class="property-grid grid m-auto">
            <div class="container m-auto ">


                <div class="row m-auto">

                    <!-- Validation Errors -->
                    <div class="col-sm-12 section-t8">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="col-md-12 col-lg-8">
                                    <div class="title-single-box">
                                        <h1 class="title-single">  تسجيل حساب جديد</h1>
                                    </div>
                                </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="col-md-12  mb-3">
                            <div class="form-group">
                                 <label for="name" class="form-label  text-primary fw-bold">الاسم</label>
                                <input id="name" class="form-control form-control-lg form-control-a" type="text" name="name" value="{{ old('name') }}" required  />
                                @error('name')
                                <p class="invalid-feedback d-block"> {{$message}}</p>
                                @enderror
                            </div>
                        </div>


                        <!-- Email Address -->
                        <div class="col-md-12  mb-3">
                            <div class="form-group">
                                <label for="email" class="form-label  text-primary fw-bold">البريد الالكتروني</label>

                                <input id="email" class="form-control form-control-lg form-control-a" type="email" name="email" value="{{ old('email') }}" required />
                                @error('email')
                                <p class="invalid-feedback d-block"> {{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-md-12  mb-3">
                            <div class="form-group"> <label for="password">كلمة المرور</label>

                                <input id="password" class="form-control form-control-lg form-control-a" type="password"
                                    name="password" required autocomplete="new-password" />
                                    @error('password')
                                    <p class="invalid-feedback d-block"> {{$message}}</p>
                                    @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-12  mb-3">
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label  text-primary fw-bold">تأكيد كلمة
                                    المرور</label>

                                <input id="password_confirmation" class="form-control form-control-lg form-control-a"
                                    type="password" name="password_confirmation" required />
                                    @error('password_confirmation')
                                    <p class="invalid-feedback d-block"> {{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a class="text-primary underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('لديك حساب؟ تسجيل الدخول') }}
                            </a>
                            <div class="col-md-12  mb-3">
                                <div class="form-group">
                                    <button class="ml-4 btn btn-primary">
                                        {{ __('تسجيل') }}
                                    </button>
                                </div>
                            </div>
                    </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
