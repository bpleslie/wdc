<div class="form-group">
    <label for="title" class="col-md-3 control-label">
        Name
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="name"
               id="name" value="{{ $name }}">
    </div>
</div>

<div class="form-group">
    <label for="street" class="col-md-3 control-label">
        Street
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="street"
               id="street" value="{{ $street }}">
    </div>
</div>
<div class="form-group">
    <label for="city" class="col-md-3 control-label">
        City
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="city"
               id="city" value="{{ $city }}">
    </div>
</div>
<div class="form-group">
    <label for="state" class="col-md-3 control-label">
        State
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="state"
               id="state" value="{{ $state }}">
    </div>
</div>
<div class="form-group">
    <label for="postcode" class="col-md-3 control-label">
        Postcode
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="postcode"
               id="postcode" value="{{ $postcode }}">
    </div>
</div>
<div class="form-group">
    <label for="country" class="col-md-3 control-label">
        Country
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="country"
               id="country" value="{{ $country }}">
    </div>
</div>

<div class="form-group">
    <label for="meta_description" class="col-md-3 control-label">
        Meta Description
    </label>
    <div class="col-md-8">
    <textarea class="form-control" id="meta_description"
              name="meta_description" rows="3">{{
      $meta_description
    }}</textarea>
    </div>
</div>

<div class="form-group">
    <label for="page_image" class="col-md-3 control-label">
        Page Image
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="page_image"
               id="page_image" value="{{ $city }}">
    </div>
</div>

<div class="form-group">
    <label for="layout" class="col-md-3 control-label">
        Layout
    </label>
    <div class="col-md-4">
        <input type="text" class="form-control" name="layout" id="layout"
               value="{{ $layout }}">
    </div>
</div>

<div class="form-group">
    <label for="reverse_direction" class="col-md-3 control-label">
        Direction
    </label>
    <div class="col-md-7">
        <label class="radio-inline">
            <input type="radio" name="reverse_direction"
                   id="reverse_direction"
                   @if (! $reverse_direction) checked="checked" @endif
                   value="0"> Normal
        </label>
        <label class="radio-inline">
            <input type="radio" name="reverse_direction"
                   @if ($reverse_direction) checked="checked" @endif
                   value="1"> Reversed
        </label>
    </div>
</div>


<div class="form-group">
    <label for="lat" class="col-md-3 control-label">
        Latitude
    </label>
    <div class="col-md-4">
        <span>{{ $lat }}</span>
    </div>
</div>


<div class="form-group">
    <label for="long" class="col-md-3 control-label">
        Longitude
    </label>
    <div class="col-md-4">
        <span>{{ $long }}</span>
    </div>
</div>