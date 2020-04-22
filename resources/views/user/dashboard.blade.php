@extends('layouts.app_master_user')
@section('content')
    <section>
        <div class="title">Trang tổng quan cá nhân</div>
        <div class="row">
            <div class="col-3">
                <div class="box-count" style="background: #00c0ef">
                    <div class="count-text"></div>
                    <p class="count-name">Tổng đơn</p>
                </div>
            </div>
            <div class="col-3">
                <div class="box-count" style="background: #dd4b39">
                    <div class="count-text"></div>
                    <p class="count-name">Đơn huỷ</p>
                </div>
            </div>
            <div class="col-3">
                <div class="box-count" style="background: #f39c12">
                    <div class="count-text"></div>
                    <p class="count-name">Tiếp nhận && Giao hàng</p>
                </div>
            </div>
            <div class="col-3">
                <div class="box-count" style="background: #00a65a">
                    <div class="count-text"></div>
                    <p class="count-name">Hoàn thành</p>
                </div>
            </div>
        </div>
    </section>
@stop