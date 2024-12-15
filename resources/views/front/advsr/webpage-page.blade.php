{{-- @extends('customer.layouts.blank-vanilla') --}}
@extends('front.advsr.layouts.blank')
@section('title')
{{$page->title}} | Pages
@endsection
@section('content')

<div class="page_top_wrap page_top_title page_top_breadcrumbs">
    <div class="content_wrap">
        <div class="breadcrumbs">
            <a class="breadcrumbs_item home" href="/">Home</a>
            <span class="breadcrumbs_delimiter"></span>
            <span class="breadcrumbs_item current">Pages</span>
        </div>
        <h1 class="page_title">{{$page->title}}</h1>
    </div>
</div>

<div class="page_content_wrap">
    <div class="content_wrap">
        <div class="content">
            <article class="post_item post_item_single post has-post-thumbnail">
                {{-- <section class="post_featured">
                    <div class="post_thumb" data-image="{{$page->logo}}"
                        data-title="{{$page->title}}">
                        <a class="hover_icon hover_icon_view inited" href="{{$page->logo}}"
                            title="{{$page->title}}y" rel="magnific">
                            <img alt="{{$page->title}}"
                                src="{{$page->logo}}">
                        </a>
                    </div>
                </section> --}}
                <section class="post_content" style="font-size:1.5em;">
                  {!! $page->body !!}
                </section>
            </article>

        </div>
    </div>
</div>

@endsection
