<div id="slider">
    <div class="imageSlide js-banner owl-carousel">
        @foreach($slides as $slide)
        <div>
            <a href="" title="{{$slide->s_name}}">
                <img alt="DQW" src="{{asset($slide->s_image)}}" />
            </a>
        </div>
        @endforeach
    </div>
</div>
