@extends('landing.master')
@section('content')
@foreach ($data as $value)
<section class="section blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-details">
                        <div class="main-content-head">
                            <div class="meta-information">
                                <h2 class="post-title"><a href="{{ url('blog/'.$value->slug.'') }}">{{ $value->title }}</a></h2>
                                <ul class="meta-info">
                                    <li><a href="javascript:void(0)"><img src="{{ URL::asset('images/'.$value->user->thumbnail.'') }}" alt="#">{{ $value->user->name }}</a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-calendar"></i>{{ format_datetime($value->created_at) }}</a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-tag"></i>{{ $value->categories->name }}</a></li>
                                </ul><hr>Tags: 
                                @foreach ($tags as $tag) 
                                @if ($tag->blog_id == $value->id)
                                    <span class="badge bg-primary">{{ $tag->name }}</span>
                                    @endif
                                @endforeach

                            </div>
                            <div class="post-thumbnils"><img src="{{ URL::asset('blog-img/'.$value->thumbnail.'') }}" alt="#"></div>
                            <div class="detail-inner text-dark">
                                {!! $value->content !!}
                                <div class="post-social-media">
                                    <h5 class="share-title text-dark">Social Share</h5>
                                    <ul class="fw-bold">
                                        <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i><span>facebook</span></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i><span>twitter</span></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-google"></i><span>google+</span></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i><span>linkedin</span></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-pinterest"></i><span>pinterest</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="col-lg-4 col-md-12 col-12">
                <div class="sidebar blog-grid-page">
                    <div class="widget popular-feeds">
                        <h5 class="widget-title">Artikel Terbaru</h5>
                        <div class="popular-feed-loop">
                            @foreach ($blog as $value)
                            <div class="single-popular-feed">
                                <div class="feed-desc"><a class="feed-img" href="121{{ url('blog/'.$value->slug.'') }}"><img src="{{ URL::asset('blog-img/'.$value->thumbnail.'') }}" alt="#"></a><a href="javascript:void(0)" class="cetagory">{{ $value->categories->name }}</a>
                                    <h6 class="post-title"><a href="{{ url('blog/'.$value->slug.'') }}">{{ (strlen($value->title) > 50) ? ''.substr(nl2br($value->title),0, 50).'...'  : nl2br($value->title) }}</a></h6><span class="time"><i class="lni lni-calendar"></i>{{ format_datetime($value->created_at) }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="widget categories-widget">
                        <h5 class="widget-title">Categories</h5>
                        <ul class="custom">
                            @foreach ($categories as $value)
                            <li><a href="javascript:void(0)">{{ $value->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endforeach
@endsection