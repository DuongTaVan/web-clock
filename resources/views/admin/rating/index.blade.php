@extends('layouts.app_master_admin')

@section('content')
<style type="text/css">
	.ratings span.active i{
		color: #faca51;
	}
	.ratings span i{
		color: #eff0f5;
	}
</style>
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lí danh mục Rating
        <small>Rating</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.rating.index')}}">Rating</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
        	<div class="box-header">
        		<h3 class="box-title"><a href="{{route('admin.user.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
        	</div>
        
	        <div class="box-body">
	        	<div class="col-md-12">
	          		<table class="table">
	                <tbody><tr>
	                  <th style="width: 10px">#</th>
	                  
	                  <th>User</th>
	                  <th>Product</th>
	                  <th>Rating</th>
	 				  <th>Content</th>
                      <th>Time</th>
	                  <th>Action</th>
	                </tr>

                  @foreach($ratings as $rating)
	                <tr>
	                  <td>{{$rating->id}}</td>
	                  <td>{{$rating->user->name ?? ['N/A']}}</td>
	                  <td>{{$rating->product->pro_name ?? ['N/A']}}</td>
	                  <td>
	                  	<div class="ratings">
	                  		@for($i=1; $i<=5; $i++)
	                  		<span class="{{$i<=$rating->r_number ? 'active' : ''}}"><i class="fa fa-star"></i></span>
	                  		@endfor
	                  	</div>
	                  </td>
	                  <td>{{$rating->r_content}}</td>
	                  
                   	  <td>{{$rating->created_at}}</td>
	                  <td>
                     
                      <a href="{{route('admin.rating.delete',$rating->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a> 
                    </td>
	                </tr>
                  @endforeach
                  
	              </tbody></table>
	              <div>{{$ratings->links()}}</div>
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
 