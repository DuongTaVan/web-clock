@extends('layouts.app_master_admin')
@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm role
        <small>Role</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('role.list')}}">Role</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
        	
        
	        <div class="box-body">
	        	<div class="col-md-8">
	          		
			           
			            <!-- /.box-header -->
			            <!-- form start -->
			            <form role="form" action="{{route('role.postedit',$role->id)}}" method="POST">
			            	@csrf
			              
			                <div class="form-group">
			                  <label >Name <span class="text-danger">(*)</span></label>
			                  <input type="text" name="name" class="form-control"  placeholder="Name ..." value="{{$role->name}}">
			                  {!!showErrors($errors,'name')!!}
			                </div>
			                <div class="form-group">
			                  <label >Display Name <span class="text-danger">(*)</span></label>
			                  <input type="text" name="display_name" class="form-control"  placeholder="Name ..." value="{{$role->display_name}}">
			                  {!!showErrors($errors,'display_name')!!}
			                </div>
	
			         	
							<div class="form-group">
				                <label >Permission<span class="text-danger">(*)</span></label>
			                        @foreach($permissions as $permission)
			                        <div class="checkbox" >
			                            <label>
			                                <input type="checkbox" name="permission[]" value="{{$permission->id}}"
			                                {{$getallPer->contains($permission->id)? 'checked' : ''}}
			                                 >
			                            		{{$permission->name}}
			                            </label>
			                         </div>
			                         @endforeach

				            </div>
			              <div class="box-footer text-center">
			                <button type="submit" class="btn btn-primary"> Save <i class="fa fa-save"></i></button>
			                <a href="{{route('role.list')}}" class="btn btn-primary">Quay lại <i class="fa fa-undo"></i></a>
			              </div>
			            </form>
			        
	            </div>
	        </div>
        </div>

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->


@endsection
 