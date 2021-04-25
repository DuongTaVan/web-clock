@extends('layouts.app_master_admin')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lí danh mục Role
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
                @can('role-add')
                    <div class="box-header">
                        <h3 class="box-title"><a href="{{route('role.add')}}" class="btn btn-primary">Thêm mới <i
                                    class="fa fa-plus"></i></a></h3>
                    </div>
                @endcan
                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Vai trò</th>

                                <th>Hiển thị</th>
                                <th>Thời gian</th>
                                <th>Tùy chỉnh</th>
                            </tr>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->display_name}}</td>

                                    <td>{{$role->created_at}}</td>
                                    <td>
                                        @can('role-edit')
                                            <a href="{{route('role.edit',$role->id)}}" class="btn btn-xs btn-primary"><i
                                                    class="fa fa-pencil">Edit</i></a>
                                        @endcan
                                        @can('role-delete')
                                            <a href="{{route('role.delete',$role->id)}}"
                                               class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a>
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
