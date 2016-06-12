@extends('retailer.layouts.master')

@section('page-header')
    <header class="intro-header"
            style="background-image: url('/uploads/post-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Retailers</h1>
                        <hr class="small">
                        <h2 class="subheading">Find a retailer near you</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                {{-- The Retailers --}}
                @foreach ($retailers as $retailer)
                    <div class="retailer-preview">
                        <a href="/retailer/{{ $retailer->id }}">
                            <h2 class="retailer-title">{{ $retailer->name }}</h2>
                            @if ($retailer->street)
                                <h3 class="retailer-subtitle">{{ $retailer->street }}</h3>
                            @endif
                        </a>
                        <p class="retailer-meta">
{{--                            Retailered on {{ $retailer->published_at->format('F j, Y') }}--}}
                            {{--@if ($retailer->tags->count())--}}
                                {{--in--}}
                                {{--{!! join(', ', $retailer->tagLinks()) !!}--}}
                            {{--@endif--}}
                        </p>
                    </div>
                    <hr>
                @endforeach

                {{-- The Pager --}}
                <ul class="pager">

                    {{-- Reverse direction --}}
                    {{--@if ($reverse_direction)--}}
                        {{--@if ($retailers->currentPage() > 1)--}}
                            {{--<li class="previous">--}}
                                {{--<a href="{!! $retailers->url($retailers->currentPage() - 1) !!}">--}}
                                    {{--<i class="fa fa-long-arrow-left fa-lg"></i>--}}
{{--                                    Previous {{ $tag->tag }} Retailers--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                        {{--@if ($retailers->hasMorePages())--}}
                            {{--<li class="next">--}}
                                {{--<a href="{!! $retailers->nextPageUrl() !!}">--}}
                                    {{--Next {{ $tag->tag }} Retailers--}}
                                    {{--<i class="fa fa-long-arrow-right"></i>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--@else--}}
                        {{--@if ($retailers->currentPage() > 1)--}}
                            {{--<li class="previous">--}}
                                {{--<a href="{!! $retailers->url($retailers->currentPage() - 1) !!}">--}}
                                    {{--<i class="fa fa-long-arrow-left fa-lg"></i>--}}
{{--                                    Newer {{ $tag ? $tag->tag : '' }} Retailers--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                        {{--@if ($retailers->hasMorePages())--}}
                            {{--<li class="next">--}}
                                {{--<a href="{!! $retailers->nextPageUrl() !!}">--}}
                                    {{--Older {{ $tag ? $tag->tag : '' }} Retailers--}}
                                    {{--<i class="fa fa-long-arrow-right"></i>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--@endif--}}
                </ul>
            </div>

        </div>
    </div>
@stop
