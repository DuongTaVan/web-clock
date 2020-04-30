@can('transport')
adbcd
@endcan
@extends('layouts.app_master_admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lí đơn hàng
        <small>Transaction</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.transaction.index')}}">Transaction</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
          <div class="box-title">
                    <form class="form-inline">
                        <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="ID">
                        <input type="text" class="form-control" value="{{ Request::get('email') }}" name="email" placeholder="Email ...">
                        <select name="type" class="form-control">
                            <option value="0">Phân loại khách</option>
                            <option value="1"{{Request::get('type')== 1 ? "selected" : ""}} >Thành viên</option>
                            <option value="2" {{Request::get('type')== 2 ? "selected" : ""}} >Khách</option>
                        </select>
                        <select name="status" class="form-control">
                            <option value="">Trạng thái</option>
                            <option value="1" {{Request::get('status')== 1 ? "selected" : ""}} >Tiếp nhận</option>
                            <option value="2" {{Request::get('status')== 2 ? "selected" : ""}} >Đang vận chuyển</option>
                            <option value="3" {{Request::get('status')== 3 ? "selected" : ""}} >Đã bàn giao</option>
                            <option value="-1" {{Request::get('status')== -1 ? "selected" : ""}} >Huỷ bỏ</option>
                        </select>
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                        <button type="submit" name="export" value="true" class="btn btn-info">
                            <i class="fa fa-save"></i> Export
                        </button>
                    </form>
                </div>
	        <div class="box-body">
	        	<div class="col-md-12">
	          		<table class="table">
	                <tbody><tr>
	                  <th style="width: 10px">#</th>
	                  <th>Info</th>
	                  <th>Money</th>
	                  <th>Account</th>
	                  <th>Satus</th>
                      <th>Time</th>
	                  <th>Action</th>
	                </tr>
                  @foreach($transaction as $tran)
	                <tr>
	                  <td>{{$tran->id}}</td>
	                  <td>
	                  	<ul >
	                  		<li>Name: {{$tran->tst_name}}</li>
	                  		<li>Email: {{$tran->tst_email}}</li>
	                  		<li>Phone: {{$tran->tst_phone}}</li>
	                  		<li>Address: {{$tran->tst_address}}</li>
	                  	</ul>
	                  </td>
	                  <td>{{number_format($tran->tst_total_money,0,",",".")}} đ</td>
	                  <td>
	                  	@if($tran->tst_user_id == 0)
	                  		
	                  		<span class="label label-default">Khách</span>
	                  	@else
	                  		<span class="label label-success">Thành viên</span>
	                  	@endif
	                  </td>
                    <td>
                    	<span class="label label-{{$tran->getStatus($tran->tst_status)['class']}}">
                    		{{$tran->getStatus($tran->tst_status)['name']}}
                    	</span>


                    </td>
                    <td>{{$tran->created_at}}</td>
	                  <td>
                      <a  href="{{route('ajax.admin.transaction.detail',$tran->id)}}" data-id="{{$tran->id}}"  class="btn btn-xs btn-info js-preview-transaction"><i class="fa fa-eye"></i> View</a>
                      
                      <div class="btn-group">
                        <button type="button" class="btn btn-success btn-xs">Action</button>
                        <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
                         
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <a href="{{route('admin.transaction.delete',$tran->id)}}"><i class="fa fa-trash"></i> Delete</a> 
                          </li>
                          <li><a href="{{route('admin.transaction.active',['process',$tran->id])}}"><i class="fa fa-ban"></i>Đang bàn giao</a></li>
                          <li><a href="{{route('admin.transaction.active',['success',$tran->id])}}"><i class="fa fa-ban"></i>Đã bàn giao</a></li>
                          <li><a href="{{route('admin.transaction.active',['cancel',$tran->id])}}"><i class="fa fa-ban"></i>Hủy</a></li>
                        </ul>
                      </div>
                    </td>
	                </tr>
                  @endforeach
                  
	              </tbody></table>
	              <div>{{$transaction->appends($query)->links()}}</div>
	            </div>
	        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <div class="modal fade fade" id="modal-preview-transaction">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"> Chi tiết đơn hàng <b id="idTransaction"></b></h4>
                </div>
                <div class="modal-body">
                    <div class="content">
                    	
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.content -->


@endsection

 