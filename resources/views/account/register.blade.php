@extends('layouts.app_master_frontend')
@section('css')
     <link rel="stylesheet" href="{{ asset('css/home.min.css') }}">

@stop
@section('content')
    <div class="container">

        <div class="auth" style="background: white;">
            <form class="from_cart_register" action="" method="post" style="width: 500px;margin:0 auto;padding: 30px 0">
                @csrf
                <div class="form-group">
                    <label for="name">Name <span class="cRed">(*)</span></label>
                    <input name="name" id="name" type="text" value="{{  old('name') }}" class="form-control" placeholder="Nguyen Van A">
                    {!!showErrors($errors,'name')!!}

                </div>
                <div class="form-group">
                    <label for="name">Email <span class="cRed">(*)</span></label>
                    <input name="email" id="name" type="email" value="{{  old('email') }}" class="form-control" placeholder="nguyenvana@gmail.com">
                    {!!showErrors($errors,'email')!!}
                </div>
                <div class="form-group">
                    <label for="phone">Password <span class="cRed">(*)</span></label>
                    <input name="password" id="phone" type="password" placeholder="********" class="form-control">
                     {!!showErrors($errors,'password')!!}
                </div>
                <div class="form-group">
                    <label for="phone">Điện thoại <span class="cRed">(*)</span></label>
                    <input name="phone" id="phone" type="number" value="{{  old('phone') }}" placeholder="123456789" class="form-control">
                    {!!showErrors($errors,'phone')!!}
                </div>
                <div class="form-group">
                    <label for="phone">Địa chỉ <span class="cRed">(*)</span></label>
                    <input name="address" id="address" value="{{  old('address') }}" placeholder="Địa chỉ ..." class="form-control">
                    {!!showErrors($errors,'address')!!}
                </div>
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <div name ="g-recaptcha-response" class="g-recaptcha" data-sitekey="6Lfiwe4UAAAAAFcXj7A4Fe2MO5YkUt6DqOFtI9oZ" data-callback="YourOnSubmitFn"></div>
                    </div>
                </div>
                 {!!showErrors($errors,'g-recaptcha-response')!!}
                <div class="form-group">
                    <button class="btn btn-purple btn-xs">Đăng ký</button>
                    <a class="btn btn-purple btn-xs" href="{{route('frontend.account.reset_password.index')}}">Quên mật khẩu</a>
                </div>
            </form>
        </div>
    </div>
@endsection
