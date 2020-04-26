@extends('layouts.app_master_admin')
@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm danh mục event
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
        	
        
	        <div class="box-body">
	        	<div class="col-md-8">
	          		
			           
			            <!-- /.box-header -->
			            <!-- form start -->
			            <form role="form" action="admin/event/createe" method="POST" enctype="multipart/form-data">
			            	@csrf
			              
			                <div class="form-group">
			                  <label >Name <span class="text-danger">(*)</span></label>
			                  <input type="text" name="ev_name" class="form-control"  placeholder="Name ...">
			                  {!!showErrors($errors,'trm_name')!!}
			                </div>
							<div class="form-group">
								<label >Location <span class="text-danger">(*)</span></label>
	                            <div class="row">
	                                <div class="col-sm-2">
	                                    <div class="form-group ">
	                                        <label for="name">Home 1 </label>
	                                        <input type="checkbox" name="location" value="1">
	                                    </div>
	                                </div>
	                                <div class="col-sm-2">
		                                    <div class="form-group ">
		                                        <label for="name">Home 2 </label>
		                                        <input type="checkbox" name="location" value="2">
		                                    </div>
		                            </div>
	                                <div class="col-sm-2">
	                                    <div class="form-group ">
	                                        <label for="name">Home 3 </label>
	                                        <input type="checkbox" name="location" value="3">
	                                    </div>
	                                </div>
	                                
		                        </div>
	                        </div>
							
			                <div class="form-group">
			                 	<label class="form-label">Image <span class="text-danger">(*)</span></label>
			                    <input type="file" id="uploadfile" name="image" >
			                    <img height="348px" width="314px" src="" alt="" id="demo_image">
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
 