<div class="lists" id="list-comment">
    @foreach($comments as $cmt)
        <div class="item">
            <p class="item-auth">
                <span>d</span>
                <span>{{$cmt->cmt_name}}</span>
            </p>
            <p class="item-content">{{$cmt->cmt_content}}</p>
            <p class="item-footer">
                <a href="" class="js-show-form-reply" data-id="{{ $cmt->id }}"
                   data-product="{{ $cmt->cmt_product_id }}" data-name="{{ $cmt->user->name ?? "[N\A]" }}">Trả lời</a>
                <span>-</span>
                <a href="">{{ $cmt->created_at->diffForHumans() }}</a>
            </p>
            @foreach($rep_comments as $rep_comment)
            @if($rep_comment->rcmt_comment_id == $cmt->id)
                <div class="comments-reply">

                        <div class="item">
                            <p class="item-auth">
                                <span>d</span>
                                <span>{{$rep_comment->rcmt_name}}</span>
                            </p>
                            <p class="item-content">{{$rep_comment->rcmt_content}}</p>
                            <p class="item-footer">
                                <a href="" class="js-show-form-reply" data-name="{{ $rep_comment->user->name ?? "[N\A]" }}"
                                   data-id="{{ $rep_comment->id }}" data-product="{{ $rep_comment->rcmt_product_id }}">Trả lời</a>
                                <a href=""><i class="fa fa-thumbs-up"></i>Hài lòng</a>
                                <a href=""><i class="fa fa-thumbs-down"></i>Không hài lòng</a>
                                <a href="">{{ $cmt->created_at->diffForHumans() }}</a>
                            </p>
                        </div>
                   
                </div>
                @endif
                @endforeach
      
        </div>
        @endforeach
    <div> 
    </div>
</div>
