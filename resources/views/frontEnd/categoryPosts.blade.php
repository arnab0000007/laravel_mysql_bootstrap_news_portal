@extends('layouts.frontendapp')
@section('frontend_content')

<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>{{$category->post_category }} </h2>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Default News Area -->
<section class="default-news-area ptb-40">
    <div class=container>
        <div class=row>
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-lg-8">
                        @if ($latestPost!= null)
                        <div class=single-default-news> <img
                            src="{{ asset('uploads/postImages')}}/{{$latestPost->post_image }}" alt=image>
                        <div class=news-content>
                            <ul>
                                <li><i class=icofont-user-suited></i> by {{$latestPost->author_name}}</li>
                                <li><i class=icofont-calendar></i> {{$latestPost->created_at->format("F j, Y")}}
                                </li>
                            </ul>
                            <h3><a
                                    href="{{url('/post/details')}}/{{$latestPost->id}}">{{Str::limit($latestPost->post_title,35)}}</a>
                            </h3>
                        </div>
                        <div class=tags> <a href="{{url('/category')}}/{{$latestPost->category_id}}">{{ $latestPost->relationCategory->post_category}}</a> </div>
                    </div>
                        @endif

                        <div class=row>
                            @forelse ($latestPost23 as $post)
                            <div class="col-lg-6 col-md-6">
                                <div class=single-default-inner-news>
                                    <div class=news-image> <img
                                            src="{{ asset('uploads/postImages')}}/{{$post->post_image }}" alt="image">
                                    </div>
                                    <div class=news-content>
                                        <h3>{{Str::limit($post->post_title,25)}}</h3>
                                        <span><i class=icofont-user-suited></i> by {{$post->author_name}}</span>

                                    </div><a href="{{url('/post/details')}}/{{$post->id}}" class=link-overlay></a>
                                    <div class="tags bg-2"> <a href="{{url('/category')}}/{{$post->category_id}}">{{ $post->relationCategory->post_category}}</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="text-muted m-auto pt-3 pb-3">No Post is Available</p>

                            @endforelse
                        </div>
                    </div>
                    <div class="col-lg-4">
                        {{-- <div class="small-image-ads text-center"> <a href="#"><img
                                    src="{{asset('frontendAssets\img\1-ads.png')}}" alt="image"></a> </div> --}}
                        @forelse ($latestPost45 as $post)
                        <div class=single-default-inner-news>
                            <div class=news-image> <img src="{{ asset('uploads/postImages')}}/{{$post->post_image }}"
                                    alt=image> </div>
                            <div class=news-content>
                                <h3>{{Str::limit($post->post_title,25)}}</h3> <span><i class=icofont-calendar></i>
                                    {{$post->created_at->format("F j, Y")}}</span>
                            </div><a href="{{url('/post/details')}}/{{$post->id}}" class=link-overlay></a>
                            <div class="tags bg-4"> <a href="{{url('/category')}}/{{$post->category_id}}">{{ $post->relationCategory->post_category}}</a> </div>
                        </div>
                        @empty
                        <p class="text-muted text-center pt-3 pb-3">No Post is Available</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Default News Area -->

<!-- Start All Category News Area -->
<section class="all-category-news ptb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 m-auto">
                <div class="section-title">
                    <h2>All News</h2>
                </div>
                @forelse ($posts as $post)
                <div class="single-category-news">
                    <div class="row m-0 align-items-center">
                        <div class="col-lg-5 col-md-6 p-0">
                            <div class="category-news-image">
                                <a href="{{url('/post/details')}}/{{$post->id}}"><img
                                        src="{{ asset('uploads/postImages')}}/{{$post->post_image }}" alt="image"></a>

                                <div class="tags">
                                    <a href="{{url('/category')}}/{{$post->category_id}}">{{$post->relationCategory->post_category}}</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="category-news-content">
                                <span> <i class=icofont-user-suited></i> by {{$post->author_name }}</span>
                                <span><i class="icofont-clock-time"></i> {{$post->created_at->diffForHumans()}}</span>
                                <h3><a
                                        href="{{url('/post/details')}}/{{$post->id}}">{{Str::limit($post->post_title,70)}}</a>
                                </h3>
                                <p>{{Str::limit($post->post_description,250)}}<a
                                        href="{{url('/post/details')}}/{{$post->id}}" class="niloy">আরো পড়ুন </a></p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-muted text-center pt-3 pb-3">No Post is Available</p>
                @endforelse
                {{ $posts ->links()}}
            </div>
        </div>
    </div>
</section>
<!-- End All Category News Area -->

<!-- Start More News Area -->
<section class=more-news-area>
    <div class=container>
        <div class=more-news-inner>
            <div class=section-title>
                <h2>More Post</h2>
            </div>
            <div class=row>
                <div class="more-news-slides owl-carousel owl-theme">
                    @forelse ($latestPost6 as $post)
                    <div class="col-lg-12 col-md-12">
                        <div class=single-more-news> <img src="{{ asset('uploads/postImages')}}/{{$post->post_image }}"
                                alt=image>
                            <div class=news-content>
                                <ul>
                                    <li><i class=icofont-user-suited></i> by {{$post->author_name }}</li>
                                    <li><i class=icofont-calendar></i> {{$post->created_at->format("F j, Y")}}</li>
                                </ul>
                                <h3><a
                                        href="{{url('/post/details')}}/{{$post->id}}">{{Str::limit($post->post_title,40)}}</a>
                                </h3>
                            </div>
                            <div class="tags bg-2"> <a href="{{url('/category')}}/{{$post->category_id}}">{{ $post->relationCategory->post_category}}</a> </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-dark text-center pb-5">No Post is Available</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End More News Area -->
@endsection
