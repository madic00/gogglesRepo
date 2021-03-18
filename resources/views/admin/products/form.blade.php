    <form action="@if($action == "products.update") {{ route($action, $product->id) }} @else {{ route($action) }} @endif" method="POST" enctype="multipart/form-data">

        @csrf
        @if($action == 'products.update')
            @method("PUT")
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name" value="{{ $product->name ?? old('name') }}" />
            <p class="help-block">Example block-level help text here.</p>

            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5">{{ $product->description ?? old('description') }}</textarea>

            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="form-group">
            <label for="price">Price</label>
            {{-- <input class="form-control" id="price" name="price" value="{{ old('price') ?? $product->prices[count($product->prices) - 1]->price }}" /> --}}
            <input class="form-control" id="price" name="price" value="@if(isset($product)) {{ $product->prices[count($product->prices) - 1]->price  }} @else {{ old('price') }} @endif" />

            @error('price')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(isset($product) && $category->id == $product->category_id) selected="selected" @endif >{{ $category->category_name }}</option>
                @endforeach
            </select>

            @error('category')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <div class="radio">
                    <input type="radio" name="gender_id" id="gender_male" value="1" @if(isset($product) && $product->gender_id == 1) checked @endif />  Male
            </div>

            <div class="radio">
                <input type="radio" name="gender_id" id="gender_female" value="0" @if(isset($product) && $product->gender_id == 0) checked @endif  />  Female
            </div>

            @error('gender')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
   
        </div>

        <div class="form-group">
            <label for="brand">Brand</label>
            <select class="form-control" name="brand_id" id="brand_id">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" @if(isset($product) && $brand->id == $product->brand_id) selected="selected" @endif>{{ $brand->brand_name }}</option>
                @endforeach
            </select>

            @error('brand')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="gender">Featured</label>
            <div class="radio">
                    <input type="radio" name="featured" id="featured_true" value="1" @if(isset($product) && $product->featured == 1) checked @endif />  Yes
            </div>

            <div class="radio">
                <input type="radio" name="featured" id="featured" value="0" @if(isset($product) && $product->featured == 0) checked @endif />  No
            </div>

            @error('featured')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
   
        </div>

        <div class="form-group">
            <label for="gender">Active</label>
            <div class="radio">
                    <input type="radio" name="is_active" id="active_yes" value="1" @if(isset($product) && $product->is_active == 1) checked @endif />  Yes
            </div>

            <div class="radio">
                <input type="radio" name="is_active" value="0" @if(isset($product) && $product->is_active == 0) checked @endif  />  No
            </div>

            @error('active')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>

        @php 
            // $images = ['Main image', 'Secondary image', 'Secondary image'];

            $images = [
                ['Main image', 'image'],
                ['Secondary image', 'image2'],
                ['Secondary image', 'image3']
            ];  
        
        @endphp



            @foreach($images as $key => $image) 
                <div class="form-group">
                    <label for="image">{{ $image[0] }}</label>
                    <input type="file" name="{{ $image[1] }}" id="{{ $image[1] }}" />

                    @error($image[1])
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
            @endforeach


        {{-- <div class="form-group">
            <label for="image">Main image</label>
            <input type="file" name="image" id="image" />

            @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="form-group">
            <label for="image">Secondary image</label>
            <input type="file" name="image2" id="image2" />

            @error('image2')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Secondary image</label>
            <input type="file" name="image3" id="image3" />

            @error('image3')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div> --}}


        <button type="submit" class="btn btn-primary">Submit</button>

    </form>