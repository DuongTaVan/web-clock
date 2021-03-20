@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/blog_detail.min.css') }}">
@stop
@section('content')
    <div class="container">
        @include('frontend.components.breadcrumb')
        <div class="blog-main">
            <div class="left">
                <div class="post-detail">
                    <h1 class="post-detail__title">{{$article_detail->a_name}}</h1>
                    <p class="post-detail__intro">{!!$article_detail->a_description!!}</p>
                    <div class="post-detail__content">
                        @include('frontend.pages.article_detail.include._inc_content',['article_detail'=>$article_detail])
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="top-question">
                    <div class="title">Hỏi đáp về đồng hồ</div>
                    <ul>
                        @foreach($articleHotSidebarTop as $key=> $item)
                        <li>
                            <span class="stt">{{++$key}}</span><a href="{{route('frontend.blog_detail.index',$item->a_slug.'-'.$item->id)}}">{{$item->a_name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                @include('frontend.components.top_product',['top_producs'=>$top_produc_pays])
                @include('frontend.components.top_article',['products'=>$top_articles])
            </div>
        </div>
    </div>
@stop
@section('script')

@stop
