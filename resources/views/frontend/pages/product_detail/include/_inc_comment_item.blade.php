
        <div class="item">
            <p class="item-auth">
                <span>d</span>
                <span>{{$comment->cmt_name}}</span>
            </p>
            <p class="item-content">{{$comment->cmt_content}}</p>
            <p class="item-footer">
                <a href="" class="js-show-form-reply" data-id="{{ $comment->id }}"
                   data-product="{{ $comment->cmt_product_id }}" data-name="{{ $comment->user->name ?? "[N\A]" }}">Trả lời</a>
                <span>-</span>
                <a href="">{{ $comment->created_at->diffForHumans() }}</a>
            </p>
            
               
      
        </div>



