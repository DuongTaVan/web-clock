@extends('layouts.app_master_admin')
@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sửa danh mục event
        <small>Event</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Edit</a></li>
        <li><a href="{{route('admin.event.index')}}">Event</a></li>
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
			            <form role="form" action="" method="POST" enctype="multipart/form-data">
			            	@csrf
			              
			                <div class="form-group">
			                  <label >Name <span class="text-danger">(*)</span></label>
			                  <input type="text" name="ev_name" class="form-control"  placeholder="Name ..." value="{{$event->ev_name}}">
			                  {!!showErrors($errors,'trm_name')!!}
			                </div>
							<div class="form-group">
								<label >Location <span class="text-danger">(*)</span></label>
	                            <div class="row">
	                            	<?php for($i=1; $i<=3; $i++){  ?>
	                                <div class="col-sm-2">
	                                    <div class="form-group ">
	                                        <label for="name">Home {{$i}} </label>
	                                        <input type="checkbox" name="location" value="{{$i}}"
	                                        {{$event->location == $i ? 'checked' : ''}}

	                                        >
	                                    </div>
	                                </div>
	                                <?php  }?>
	                                
		                        </div>
	                        </div>
							
			                <div class="form-group">
			                 	<label class="form-label">Image <span class="text-danger">(*)</span></label>
			                    <input type="file" id="uploadfile" name="image">
			                    <img height="348px" width="314px" src="{{$event->ev_image}}" alt="" id="demo_image">
			              	</div>
			             

			              <div class="box-footer text-center">
			                <button type="submit" class="btn btn-primary"> Save <i class="fa fa-save"></i></button>
			                <a href="{{route('admin.event.index')}}" class="btn btn-primary">Quay lại <i class="fa fa-undo"></i></a>
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
 