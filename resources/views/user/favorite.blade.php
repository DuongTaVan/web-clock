@extends('layouts.app_master_user')
@section('css')
    <style>
        <?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
@stop
@section('content')
    <section>
        <div class="title">Danh sách sản phẩm yêu thích</div>
        <form class="form-inline">
            <div class="form-group " style="margin-right: 10px;">
                <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="ID">
            </div>
            <div class="form-group" style="margin-right: 10px;">

            </div>
            <div class="form-group" style="margin-right: 10px;">
                <button type="submit" class="btn btn-pink btn-sm">Tìm kiếm</button>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mã SP</th>
                    <th scope="col">Name</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Price</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($products->favo as $pr)
                        <tr>
                            <th scope="row">
                                <a href="">{{ $pr->id }}</a>
                            </th>
                            
                            <th>{{ $pr->pro_name }}</th>
                            
                            <th>
                                <a  href="san-pham/{{$pr->id}}"  class="avatar image contain">
                                    <img style="height: 20% !important;" src="{{pare_url_file($pr->pro_avatar)}}">
                                </a>
                            </th>
                            <th> 
                                 @if($pr->pro_sale == 0)
                                    <p class="price">{{number_format($pr->pro_price,0,",",".")}} đ</p>
                                    @else
                                    <p style="text-decoration: line-through;" class="price-sale">{{number_format($pr->pro_price,0,",",".")}} đ</p>
                                    <p class="price">{{number_format(($pr->pro_price)-($pr->pro_price)*($pr->pro_sale)/100,0,",",".")}} đ</p>
                                @endif
                            </th>
                            <th>
                               {{ $pr->created_at }}
                            </th>
                            <th><a href="">Hủy bỏ</a></th>
                        </tr>
                        @endforeach
                    
            </tbody>
        </table>

    </section>
@stop
