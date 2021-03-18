    <form action="@if($action == "brands.update") {{ route($action, $brand->id) }} @else {{ route($action) }} @endif" method="POST" enctype="multipart/form-data">

        @csrf
        @if($action == 'brands.update')
            @method("PUT")
        @endif

        <div class="form-group">
            <label for="brand_name">Name</label>
            <input class="form-control" id="brand_name" name="brand_name" value="{{ $brand->brand_name ?? old('brand_name') }}" />
            <p class="help-block">Example: Gucci</p>

            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="gender">Active</label>
            <div class="radio">
                    <input type="radio" name="brand_active" id="active_yes" value="1" @if(isset($brand) && $brand->brand_active == 1) checked @endif />  Yes
            </div>

            <div class="radio">
                <input type="radio" name="brand_active" value="0" @if(isset($brand) && $brand->brand_active == 0) checked @endif  />  No
            </div>

            @error('active')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <button type="submit" class="btn btn-primary">Submit</button>

    </form>