@extends('retailer.layouts.master')

@section('page-header')

@stop

@section('content')
    <div class="map">
          {{--<iframe src="https://www.google.com/maps/d/u/0/embed?mid=11cR2lc5r5DN2U6iLyaZNjlm9D7g" width="100%" height="700px"></iframe>--}}

    </div>

    <div id="floating-panel">
        <input onclick="clearMarkers();" type=button value="Hide Markers">
        <input onclick="showMarkers();" type=button value="Show All Markers">
        <input onclick="deleteMarkers();" type=button value="Delete Markers">
    </div>
    <div id="map"></div>
    <p>Click on the map to add markers.</p>
    <script>

        // In the following example, markers appear when the user clicks on the map.
        // The markers are stored in an array.
        // The user can then click an option to hide, show or delete the markers.
        var map;
        var markers = [];

        function initMap() {
            var haightAshbury = {lat: 37.769, lng: -122.446};

            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: haightAshbury,
                mapTypeId: google.maps.MapTypeId.TERRAIN
            });

            // This event listener will call addMarker() when the map is clicked.
            map.addListener('click', function(event) {
                addMarker(event.latLng);
            });

            // Adds a marker at the center of the map.
            addMarker(haightAshbury);
        }

        // Adds a marker to the map and push to the array.
        function addMarker(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }

        // Shows any markers currently in the array.
        function showMarkers() {
            setMapOnAll(map);
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDp0EOJ-iM2DLig9rX8qwnImXiFTkH9HdU&callback=initMap">
    </script>
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
