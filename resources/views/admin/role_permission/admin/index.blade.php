@extends('layouts.app_master_admin')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lí danh mục Admin
            <small>Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('user.list')}}">Admin</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header width-border">
                @can('admin-add')
                    <div class="box-header">
                        <h3 class="box-title"><a href="{{route('user.add')}}" class="btn btn-primary">Thêm mới <i
                                    class="fa fa-plus"></i></a></h3>
                    </div>
                @endcan
                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>

                                <th>Email</th>
                                <th>Avatar</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{$admin->id}}</td>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->avatar}}</td>
                                    <td>{{$admin->phone}}</td>
                                    <td>{{$admin->address}} </td>
                                    <td>{{$admin->created_at}}</td>
                                    <td>
                                        @can('admin-edit')
                                            <a href="{{route('user.edit',$admin->id)}}"
                                               class="btn btn-xs btn-primary"><i
                                                    class="fa fa-pencil">Edit</i></a>
                                        @endcan
                                        @can('admin-delete')
                                            <a href="{{route('user.delete',$admin->id)}}" class="btn btn-xs btn-danger"><i
                                                    class="fa fa-trash">Delete</i></a>
                                        @endcan
                                    </td>

                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
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
