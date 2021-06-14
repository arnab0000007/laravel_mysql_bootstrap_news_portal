@extends('layouts.frontendapp')
@section('frontend_content')
{{-- Banner Part --}}
@if (count($banners)>0 )
<section>
    <div class="container">
        <div class=row>
            <div class="banner-slides owl-carousel owl-theme">
                @foreach ($banners as $banner)
                <div class="col-lg-12 col-md-12">
                    <div class=single-more-news> <img
                            src="{{ asset('uploads/bannerImages')}}/{{$banner->banner_image }}" alt=image class="img-fluid">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
<section class="default-news-area ptb-40">
    <div class=container>
        <div class=row>
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-lg-8">

                        @if ($latestPost != null)
                        <div class=single-default-news> <img
                                src="{{ asset('uploads/postImages')}}/{{$latestPost->post_image }}" alt=image>
                            <div class=news-content>
                                <ul>
                                    <li><i class=icofont-user-suited></i> by {{$latestPost->author_name}}</li>
                                    <li><i class=icofont-calendar></i> {{$latestPost->created_at->format("F j, Y")}}
                                    </li>
                                </ul>
                                <h3><a href="{{url('/post/details')}}/{{$latestPost->id}}">{{Str::limit($latestPost->post_title,35)}}
                                    </a>
                                </h3>
                            </div>
                            <div class=tags> <a
                                    href="{{url('category')}}/{{ $latestPost->category_id }}">{{ $latestPost->relationCategory->post_category}}</a>
                            </div>
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
                                        <h6>{{Str::limit($post->post_title,25)}}</h6>
                                        <span><i class=icofont-user-suited></i> by {{$post->author_name}}</span>
                                        <span><i
                                                class=icofont-calendar></i>{{$post->created_at->format("F j, Y")}}</span>
                                    </div>
                                    <a href="{{url('/post/details')}}/{{$post->id}}" class=link-overlay></a>
                                    <div class="tags bg-2"> <a href="">{{ $post->relationCategory->post_category}}</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <span class="text-muted m-auto pb-3">Post Will Be displayed
                                Here</span>
                            @endforelse
                        </div>
                    </div>

                    {{-- <div class="small-image-ads text-center"> <a href="#"><img src="{{asset('frontendAssets/img/1-ads.png')}}"
                    alt=image></a>
                </div> --}}

                <div class="col-lg-4">
                    @forelse ($latestPost45 as $post)

                    <div class=single-default-inner-news>
                        <div class=news-image> <img src="{{ asset('uploads/postImages')}}/{{$post->post_image }}"
                                alt=image> </div>
                        <div class=news-content>
                            <h6>{{Str::limit($post->post_title,25)}}</h6>
                            <span><i class=icofont-user-suited></i> by {{$post->author_name}}</span>
                            <span><i class=icofont-calendar></i> {{$post->created_at->format("F j, Y")}}</span>
                        </div><a href="{{url('/post/details')}}/{{$post->id}}" class=link-overlay></a>

                        <div class="tags bg-4"> <a href="#">{{ $post->relationCategory->post_category}}</a> </div>
                    </div>

                    @empty
                    <span class="text-muted m-auto pb-3">Post Will Be displayed Here</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="all-news-area ptb-40">
    <div class=container>
        <div class=row>
            <div class="col-lg-10 m-auto">
                <div class="row">
                    @forelse ($categories as $category)
                    <div class="col-lg-6 col-md-6">
                        <div class=fashion-news>
                            <div class=section-title>
                                <a href="{{url('/category')}}/{{$category->id}}" style="color: #222">
                                    <h2>{{$category->post_category}}</h2>
                                </a>
                            </div>
                            @php
                            $pos = App\Models\Post::where('category_id',
                            $category->id)->latest()->skip(1)->take(3)->get();
                            $poss = App\Models\Post::where('category_id', $category->id)->latest()->first();
                            @endphp

                            @if($poss!=null)
                            <div class=single-fashion-news>
                                <img src="{{ asset('uploads/postImages')}}/{{$poss->post_image }}" alt=image>
                                <div class=news-content>
                                    <ul>
                                        <li><i class=icofont-user-suited></i> by {{$poss->author_name}}</li>
                                        <li><i class=icofont-calendar></i> {{$poss->created_at->format("F j, Y")}}</li>
                                    </ul>
                                    <h3><a
                                            href="{{url('/post/details')}}/{{$poss->id}}">{{Str::limit($poss->post_title,30)}}</a>
                                    </h3>
                                </div>
                            </div>
                            @endif
                            @forelse ($pos as $po)
                            <div class=fashion-inner-news>
                                <div class=single-fashion-inner-news> <span><i class=icofont-calendar></i>
                                        {{$po->created_at->format("F j, Y")}}</span>
                                    <h3><a
                                            href="{{url('/post/details')}}/{{$po->id}}">{{Str::limit($po->post_title,30) }}</a>
                                    </h3>
                                    <p>{{Str::limit($po->post_description,130)}}<a
                                            href="{{url('/post/details')}}/{{$po->id}}" class="niloy">আরো পড়ুন </a>
                                    </p>
                                    <hr>
                                </div>
                            </div>
                            @empty
                            <p class="text-muted text-center pb-5">এই ক্যাটাগরিতে কোনো পোস্ট নেই</p>
                            @endforelse
                        </div>
                    </div>

                    @empty
                    <p class="text-muted text-center"> কোনো ক্যাটাগরি নেই</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
{{-- more news  --}}
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
                                    <li><i class=icofont-user-suited></i> by <a href="#">{{$post->author_name}}</a></li>
                                    <li><i class=icofont-calendar></i> {{$post->created_at->format("F j, Y")}}</li>
                                </ul>
                                <h3><a
                                        href="{{url('/post/details')}}/{{$post->id}}">{{Str::limit($post->post_title,40)}}</a>
                                </h3>
                            </div>
                            <div class="tags bg-2"> <a
                                    href="{{url('category')}}/{{ $post->category_id }}">{{ $post->relationCategory->post_category}}</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-dark text-center pb-5">More Post Will Be Displayed Here</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
