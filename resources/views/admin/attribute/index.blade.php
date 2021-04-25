@extends('layouts.app_master_admin')
@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lí thuộc tính
        <small>Attribute</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.attribute.index')}}">Attribute</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
        	<div class="box-header">
        		<h3 class="box-title"><a href="{{route('admin.attribute.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
        	</div>
        
	        <div class="box-body">
	        	<div class="col-md-12">
	          		<table class="table">
	                <tbody><tr>
	                  <th style="width: 10px">#</th>
	                  <th>Tên</th>
	                  <th>Loại</th>
	                  <th>Danh mục</th>
                    <th>Thời gian</th>
	                  <th>Tùy chỉnh</th>
	                </tr>

                  @foreach($attributes as $att)
                  
                  <tr>
                    <td>{{$att['id']}}</td>
                    
                    <td>{{$att->atb_name}}</td>
                    <td>
                      <span class="{{$att->getType($att->atb_type)['class']}}">
                        {{$att->getType($att->atb_type)['name']}}
                      </span>

                    </td>
                    <td><span class="label label-info">{{$att->cate->c_name??"[N/A]"}}</span></td>
                  
                    <td>{{$att['created_at']}}</td>
                    <td>
                      <a href="{{route('admin.attribute.update',$att->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil">Edit</i></a>
                      <a href="{{route('admin.attribute.delete',$att->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a> 
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
 