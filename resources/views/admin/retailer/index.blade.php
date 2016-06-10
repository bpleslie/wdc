@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Retailers <small>&raquo; Listing</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/retailer/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> New Retailer
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials.errors')
                @include('admin.partials.success')
                <table id="retailers-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th class="hidden-sm">ID</th>
                        <th class="hidden-md">Name</th>
                        <th class="hidden-md">Street</th>
                        <th class="hidden-md">City</th>
                        <th class="hidden-sm">State</th>
                        <th class="hidden-sm">Post Code</th>
                        <th data-sortable="false">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($retailers as $retailer)
                        <tr>
                            <td>{{ $retailer->id }}</td>
                            <td>{{ $retailer->name }}</td>
                            <td class="hidden-sm">{{ $retailer->street }}</td>
                            <td class="hidden-md">{{ $retailer->city }}</td>
                            <td class="hidden-md">{{ $retailer->state }}</td>
                            <td class="hidden-md">{{ $retailer->postcode }}</td>
                            <td>
                                <a href="/admin/retailer/{{ $retailer->id }}/edit"
                                   class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function() {
            $("#retailer-table").DataTable({
            });
        });
    </script>
@stop