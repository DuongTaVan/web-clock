@extends('layouts.app_master_admin')
@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lí Event
        <small>Event</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.event.index')}}">Event</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
        	<div class="box-header">
        		<h3 class="box-title"><a href="{{route('admin.event.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
        	</div>
        
	        <div class="box-body">
	        	<div class="col-md-12">
	          		<table class="table">
	                <tbody><tr>
	                  <th style="width: 10px">#</th>
	                  <th>Name</th>
	                  <th>Slug</th>
	                  <th>Location</th>
	                  <th>Avatar</th>
                    <th>Hot</th>
                    <th>Active</th>
	                  <th>Action</th>
	                </tr>

                  @foreach($events as $event)
                  
                  <tr>
                    <td>{{$event['id']}}</td>
                    
                    <td>{{$event->ev_name}}</td>
                    <td>{{$event->ev_slug}}</td>
                    <td>Home {{$event->location}}</td>
                    <td><img src="{{$event->ev_image}}" height="148px" width="114px"></td>
                    <td>
                      @if($event->ev_hot==1)
                        <a href="{{route('admin.event.hot',$event->id)}}" class="label label-info">Hot</a>
                      @else
                        <a href="{{route('admin.event.hot',$event->id)}}" class="label label-default">None</a> 
                     
                      @endif
                      </td>
                      <td>
                      @if($event->ev_active==1)
                        <a href="{{route('admin.event.active',$event->id)}}" class="label label-info">Hot</a>
                      @else
                        <a href="{{route('admin.event.active',$event->id)}}" class="label label-default">None</a> 
                     
                      @endif
                    
                    <td>
                    
                    <td>
                      <a href="{{route('admin.event.update',$event->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil">Edit</i></a>
                      <a href="{{route('admin.event.delete',$event->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a> 
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
 