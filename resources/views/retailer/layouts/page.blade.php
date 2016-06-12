@extends('retailer.layouts.master', [
  'title' => $retailer->name,
  'meta_description' => $retailer->meta_description ?: config('blog.description'),
])

@section('page-header')
    <header class="intro-header"
            style="background-image: url('')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="retailer-heading">
                        <h1>{{ $retailer->name }}</h1>
                        <h2 class="subheading">{{ $retailer->street }}</h2>
            <span class="meta">
{{--              Posted on {{ $retailer->published_at->format('F j, Y') }}--}}
                {{--@if ($retailer->tags->count())--}}
                    {{--in--}}
                    {{--{!! join(', ', $retailer->tagLinks()) !!}--}}
                {{--@endif--}}
            </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop

@section('content')

    {{-- The Post --}}
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
{{--                    {!! $retailer->content_html !!}--}}
                </div>
            </div>
        </div>
    </article>

    {{-- The Pager --}}
    <div class="container">
        <div class="row">
            <ul class="pager">
                {{--@if ($tag && $tag->reverse_direction)--}}
                    {{--@if ($retailer->olderPost($tag))--}}
                        {{--<li class="previous">--}}
                            {{--<a href="{!! $retailer->olderPost($tag)->url($tag) !!}">--}}
                                {{--<i class="fa fa-long-arrow-left fa-lg"></i>--}}
                                {{--Previous {{ $tag->tag }} Post--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                    {{--@if ($retailer->newerPost($tag))--}}
                        {{--<li class="next">--}}
                            {{--<a href="{!! $retailer->newerPost($tag)->url($tag) !!}">--}}
                                {{--Next {{ $tag->tag }} Post--}}
                                {{--<i class="fa fa-long-arrow-right"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                {{--@else--}}
                    {{--@if ($retailer->newerPost($tag))--}}
                        {{--<li class="previous">--}}
                            {{--<a href="{!! $retailer->newerPost($tag)->url($tag) !!}">--}}
                                {{--<i class="fa fa-long-arrow-left fa-lg"></i>--}}
                                {{--Next Newer {{ $tag ? $tag->tag : '' }} Post--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                    {{--@if ($retailer->olderPost($tag))--}}
                        {{--<li class="next">--}}
                            {{--<a href="{!! $retailer->olderPost($tag)->url($tag) !!}">--}}
                                {{--Next Older {{ $tag ? $tag->tag : '' }} Post--}}
                                {{--<i class="fa fa-long-arrow-right"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                {{--@endif--}}
            </ul>
        </div>

    </div>
@stop
