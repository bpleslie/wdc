@extends('retailer.layouts.master')

@section('page-header')

@stop

@section('content')
    <div class="map">
          <iframe src="https://www.google.com/maps/d/u/0/embed?mid=11cR2lc5r5DN2U6iLyaZNjlm9D7g" width="100%" height="700px"></iframe>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-10 col-md-offset-1">
                {{-- map --}}
                {{-- The Posts --}}
                @foreach ($retailers as $retailer)
                    <div class="retailer-preview">
                        <a href="">
                            <h2 class="retailer-title">{{ $retailer->title }}</h2>
                            @if ($retailer->subtitle)
                                <h3 class="retailer-subtitle">{{ $retailer->subtitle }}</h3>
                            @endif
                        </a>
                        <p class="retailer-meta">
{{--                            Posted on {{ $retailer->published_at->format('F j, Y') }}--}}
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
                                    {{--Previous {{ $tag->tag }} Posts--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                        {{--@if ($retailers->hasMorePages())--}}
                            {{--<li class="next">--}}
                                {{--<a href="{!! $retailers->nextPageUrl() !!}">--}}
                                    {{--Next {{ $tag->tag }} Posts--}}
                                    {{--<i class="fa fa-long-arrow-right"></i>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--@else--}}
                        {{--@if ($retailers->currentPage() > 1)--}}
                            {{--<li class="previous">--}}
                                {{--<a href="{!! $retailers->url($retailers->currentPage() - 1) !!}">--}}
                                    {{--<i class="fa fa-long-arrow-left fa-lg"></i>--}}
                                    {{--Newer {{ $tag ? $tag->tag : '' }} Posts--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                        {{--@if ($retailers->hasMorePages())--}}
                            {{--<li class="next">--}}
                                {{--<a href="{!! $retailers->nextPageUrl() !!}">--}}
                                    {{--Older {{ $tag ? $tag->tag : '' }} Posts--}}
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
