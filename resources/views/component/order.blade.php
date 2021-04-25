<table class="table table-condensed">
    <tbody><tr>
      <th style="width: 10px">#</th>
      <th>Tên</th>
      <th>Hình ảnh</th>
      <th>Giá</th>
      <th>Số lượng</th>
      <th>Tổng</th>
      <th>Tùy chỉnh</th>
    </tr>
    @foreach($order as $or)
    <tr>
      <td>{{$or->id}}</td>
      <td>{{$or->product->pro_name??"[N/A]"}}</td>
      <td><img width="80px" height="120px" src="{{ pare_url_file($or->product->pro_avatar??'')}}" class="lazyload"></td>
      <td>{{number_format($or->od_price),0,",","."}}</td>
      <td>{{$or->od_qty}}</td>
      <td>{{number_format(($or->od_price)*($or->od_qty)),0,",","."}}</td>
      <td><a class="label label-danger js-delete-order-item" href="{{route('ajax.admin.transaction.delete_order',$or->id)}}"><i class="fa fa-trash"></i> Delete</a></td>
    </tr>
    @endforeach
   
  </tbody>
</table>