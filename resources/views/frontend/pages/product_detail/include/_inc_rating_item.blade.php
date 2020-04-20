
    <div class="item">
        <p class="item_author">
            <span>{{ $rating->user->name ?? "Admin" }}</span>
            <span class="item_success"><i class="fas fa-check-circle"></i> Đã mua hàng tại DuongGA</span>
        </p>
        <div class="item_review">
            <span class="item_review">
                @for ($j = 1 ; $j <= 5 ; $j ++)
                    <i class="fa fa-star {{ $j <= $rating->r_number ? 'active' : 'no_active' }}"></i>
                @endfor
            </span>
            
            {{$rating->r_content}}
        </div>
        <div class="item_footer">
            <span class="item_time"><i class="fa fa-clock-o"></i> đánh giá {{$rating->created_at}}</span>
        </div>
    </div>

