@extends('admin.master')

@section('title', 'trang chủ')

@section('main')


    <div class="content-wrapper">
       
        <form action="{{ route('admin.product.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data"
     
       
            class="mx-4 contact-us">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <fieldset>
                <legend>
                    Default Update Movies
                </legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-8">
                            <label class="control-label">Movie title</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $data->name) }}" />
                        </div>

                        <div class="col-md-4 selectContainer">
                            <label class="control-label">Genre</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($category as $item)
                                    <option
                                        value="{{ $item->id }}"{{ $data->category_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <label class="control-label">Director</label>
                            <input type="text" class="form-control" name="director"
                                value="{{ old('director', $data->director) }}" />
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label class="control-label">Price</label>
                            <input type="text" class="form-control" name="price"
                                value="{{ old('price', $data->price) }}" />
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label class="control-label">Producer</label>
                            <input type="text" class="form-control" name="producer"
                                value="{{ old('producer', $data->producer) }}" />
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label class="control-label">Website</label>
                            <input type="text" class="form-control"
                                name="website"value="{{ old('website', $data->website) }}" />
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <label class="control-label">Youtube trailer</label>
                            <input type="text" class="form-control" name="trailer"
                                value="{{ old('trailer', $data->trailer) }}" />
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-group font">
                    <label class="control-label">Review</label>
                    <textarea class="form-control " name="review" rows="8">{{ old('review', $data->review) }}</textarea>
                </div>
            </fieldset>
            {{--  --}}
            
            <div class="d-flex">
                <div class="box">
                    <div class="content">
                        
                        <img class="ig"  src="{{ asset('image/' . $data->image) }}"  alt="" > 
                   
                    
                    </div>
                  </div>
                  <input type="file" class="" name="image">

            </div>
           
  

            {{--  --}}

            <fieldset>
                <div class="form-group">

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <label class="control-label">Status</label>
                        </div>

                        <div class="col-sm-12 col-md-10">

                            <div class="mb-3">
                                <select name="status" class="form-select" aria-label="Default select example">
                                    <div selected>
                                        <option value="1"{{ old('status', $data->status) == 1 ? 'selected' : '' }}>
                                            Terrible</option>
                                        <option value="2"{{ old('status', $data->status) == 2 ? 'selected' : '' }}>
                                            Watchable</option>
                                        <option value="3"{{ old('status', $data->status) == 3 ? 'selected' : '' }}>
                                            Best
                                            ever</option>
                                    </div>

                                </select>
                            </div>


                        </div>

                    </div>

                </div>
            </fieldset>

            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12">
                        <button class="" type="submit">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                            Update Movies
                        </button>
                    </div>
                </div>
            </div>
            @csrf
        </form>





    </div>



@stop
