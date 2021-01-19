@extends('layouts.app_master_admin')
@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lí danh mục User
        <small>User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.user.index')}}">User</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
        
	        <div class="box-body">
	        	<div class="col-md-12">
	          		<table class="table">
	                <tbody><tr>
	                  <th style="width: 10px">#</th>
	                  <th>Name</th>
	                  <th>Email</th>
	                  <th>Phone</th>
	                  <th>Address</th>
                      <th>Time</th>
	                  <th>Action</th>
	                </tr>
                  @foreach($user as $user)
	                <tr>
	                  <td>{{$user->id}}</td>
	                  <td>{{$user->name}}</td>
	                  <td>{{$user->email}}</td>
	                  <td>{{$user->phone}}</td>
	                  <td>{{$user->address}}</td>
                   	  <td>{{$user->created_at}}</td>
	                  <td>
                      <a href="{{route('admin.user.delete',$user->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a> 
                    </td>
	                </tr>
                  @endforeach
                  
	              </tbody></table>
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
    <!-- /.content -->


@endsection
 