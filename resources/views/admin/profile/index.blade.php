@extends('layouts.app_master_admin')
@section('content')

<div class="col-md-8">
<form role="form" action="{{route('profile.update',$admin->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
	<div class="box-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Tên</label>
      <input name="name" class="form-control" id="exampleInputEmail1" value="{{$admin->name}}" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input name="email" type="email" value="{{$admin->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mật khẩu</label>
      <input name="password" type="password" value="{{$admin->password}}" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Địa chỉ</label>
      <input name="address" value="{{$admin->address}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Số điện thoại</label>
      <input name="phone" value="{{$admin->phone}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label class="form-label">Hình ảnh<span class="text-danger">(*)</span></label>
        <input type="file" id="uploadfile" name="image" >
        <img height="160px" width="160px" src="{{$admin->avatar}}" alt="" id="demo_image">
    </div>

  </div>
  <div class="box-footer text-center">
    <button type="submit" class="btn btn-primary"> Lưu <i class="fa fa-save"></i></button>
    <a href="admin/" class="btn btn-primary">Quay lại <i class="fa fa-undo"></i></a>
  </div>
</form>
</div>
@endsection