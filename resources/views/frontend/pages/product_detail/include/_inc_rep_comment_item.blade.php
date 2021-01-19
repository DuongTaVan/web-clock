<div class="comments-reply">

    <div class="item">
        <p class="item-auth">
            <span>d</span>
            <span>{{$rep_comment->rcmt_name}}</span>
        </p>
        <p class="item-content">{{$rep_comment->rcmt_content}}</p>
        <p class="item-footer">
            
            <a class="js-like" href=""><i class="fa fa-thumbs-up"></i>Hài lòng</a>
            <a class="js-like" href=""><i class="fa fa-thumbs-down"></i>Không hài lòng</a>
            <a href="">{{ $rep_comment->created_at->diffForHumans() }}</a>
        </p>
    </div>

</div>