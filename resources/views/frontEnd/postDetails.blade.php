@extends('layouts.frontendapp')
@section('frontend_content')
<!-- Start News Details Area -->
<section class="news-details-area pb-40">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="icofont-home"></i> Home</a></li>
            <li><i class="icofont-rounded-right"></i></li>
            <li><a
                    href="{{url('category')}}/{{ $singlePostInfo->category_id }}">{{ $singlePostInfo->relationCategory->post_category}}</a>
            </li>
            <li><i class="icofont-rounded-right"></i></li>
            <li>{{Str::limit($singlePostInfo->post_title,40)}}</li>
        </ul>
        <div class="row">
            <div class="col-lg-8 col-md-12">

                <div class="news-details">
                    <div class="article-img">
                        <img src="{{ asset('uploads/postImages')}}/{{$singlePostInfo->post_image }}" alt="image"
                            class="pinterest-img">
                    </div>
                    <div class="article-content">
                        <ul class="entry-meta">
                            <li><i class="icofont-user"></i> <a href="#">By {{$singlePostInfo->author_name}}</a></li>
                            <li><i class="icofont-calendar"></i>{{$singlePostInfo->created_at->format("F j, Y")}} </li>
                        </ul>
                        <h3 id="title">{{$singlePostInfo->post_title}}</h3>
                        <p>{{$singlePostInfo->post_description}}</p>

                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-12">
                <aside class="widget-area" id="secondary">
                    {{-- <section class="widget widget_search">
                        <form class="search-form">
                            <label>
                                <span class="screen-reader-text">Search for:</span>
                                <input type="search" class="search-field" placeholder="Search here...">
                            </label>
                            <input type="submit" class="search-submit" value="Search">
                        </form>
                    </section> --}}
                    {{-- recent Posts --}}
                    <section class="widget widget_recent_entries">
                        <h3 class="widget-title">Recent Posts</h3>

                        <ul>
                            @forelse ($recentPost as $recent)
                            <li><a href="{{url('/post/details')}}/{{$recent->id}}">
                                    {{Str::limit($recent->post_title,50)}}</a></li>
                            @empty
                            Nothing to Show
                            @endforelse
                    </section>
                    {{-- categories --}}
                    <section class="widget widget_categories">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                            @forelse ($categories as $category)
                            <li class=nav-item><a href="{{url('category')}}/{{ $category->id }}"
                                    class=nav-link>{{$category->post_category}}</a></li>
                            @empty
                            Nothing to Show
                            @endforelse
                        </ul>
                    </section>

                </aside>
            </div>
        </div>
    </div>
</section>
<!-- End News Details Area -->

<!-- Start More News Area -->
<section class=more-news-area>
    <div class=container>
        <div class=more-news-inner>
            <div class=section-title>
                <h2>More Post</h2>
            </div>
            <div class=row>
                <div class="more-news-slides owl-carousel owl-theme">
                    @foreach ($latestPost6 as $post)
                    <div class="col-lg-12 col-md-12">
                        <div class=single-more-news> <img src="{{ asset('uploads/postImages')}}/{{$post->post_image }}"
                                alt=image>
                            <div class=news-content>
                                <ul>
                                    <li><i class="icofont-user"></i> {{$post->author_name}}</li>
                                    <li><i class=icofont-calendar></i> {{$post->created_at->format("F j, Y")}}</li>
                                </ul>
                                <h3><a
                                        href="{{url('/post/details')}}/{{$post->id}}">{{Str::limit($recent->post_title,40)}}</a>
                                </h3>
                            </div>
                            <div class="tags bg-2"> <a href="#">{{ $post->relationCategory->post_category}}</a> </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End More News Area -->
<script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fe2364e3765a9d8"></script>
@endsection
