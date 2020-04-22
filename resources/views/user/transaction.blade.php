@extends('layouts.app_master_user')
@section('content')
    <section>
        <div class="title">Danh sách đơn hàng</div>
        <form class="form-inline">
            <div class="form-group " style="margin-right: 10px;">
                <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="ID">
            </div>
            <div class="form-group" style="margin-right: 10px;">
                <select name="status" class="form-control">
                    <option value="">Trạng thái</option>
                    <option value="1" {{ Request::get('status') == 1 ? "selected='selected'" : "" }}>Tiếp nhận</option>
                    <option value="2" {{ Request::get('status') == 2 ? "selected='selected'" : "" }}>Đang vận chuyển
                    </option>
                    <option value="3" {{ Request::get('status') == 3 ? "selected='selected'" : "" }}>Đã bàn giao
                    </option>
                    <option value="-1" {{ Request::get('status') == -1 ? "selected='selected'" : "" }}>Huỷ bỏ</option>
                </select>
            </div>
            <div class="form-group" style="margin-right: 10px;">
                <button type="submit" class="btn btn-pink btn-sm">Tìm kiếm</button>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mã đơn</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total</th>
                    <th scope="col">Time</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
          @foreach($transaction as $tst)
                <tr>
                    <th scope="row">
                        <a href="">DH{{ $tst->id }}</a>
                    </th>
                    <th>{{ $tst->tst_name }}</th>
                    <th>{{ number_format($tst->tst_total_money,0,',','.') }} đ</th>
                    <th>{{  $tst->created_at }}</th>
                    <th>
                        <span
                            class="label label-{{ $tst->getStatus($tst->tst_status)['class'] }}">
                            {{ $tst->getStatus($tst->tst_status)['name'] }}
                        </span>
                    </th>
                </tr>
            @endforeach

            </tbody>
        </table>

    </section>
@stop
