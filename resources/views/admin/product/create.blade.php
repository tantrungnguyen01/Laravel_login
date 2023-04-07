@extends('admin.master')

@section('title', 'trang add product')

@section('main')

    <div class="content-wrapper">

        <form id="movieForm" action="{{ route('admin.product.store') }}" method="post" class="mx-4 contact-us"
            enctype="multipart/form-data">
            @if ($errors->count() > 0)
                <div id="ERROR_COPY" style="display:none" class="alert alert-danger">

                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach

                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <fieldset>
                <div class="d-flex">
                    <legend>
                        Default Create Movies
                    </legend>

                    <nav aria-label="Page navigation example ">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ route('admin.product.index') }}">

                                    <div class="box1">
                                        <div class="content "><i class="fa-solid fa-house-chimney fa-2xl"
                                                style="color: #ffaacc;"></i></div>
                                    </div>
                                </a></li>
                        </ul>
                    </nav>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-8">
                            <label class="control-label">Movie title</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                        </div>

                        <div class="col-md-4 selectContainer">
                            <label class="control-label">Genre</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                            <input type="text" class="form-control" name="director" value="{{ old('director') }}" />
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label class="control-label">Giá Tiền</label>
                            <input type="text" class="form-control" name="price" value="{{ old('price') }}" />
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label class="control-label">Producer</label>
                            <input type="text" class="form-control" name="producer" value="{{ old('producer') }}" />
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label class="control-label">Website</label>
                            <input type="text" class="form-control" name="website"value="{{ old('website') }}" />
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <label class="control-label">Youtube trailer</label>
                            <input type="text" class="form-control" name="trailer" value="{{ old('trailer') }}" />
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-group font">
                    <label class="control-label">Review</label>
                    <textarea class="form-control" name="review" value="{{ old('review') }}" rows="8"></textarea>
                </div>
            </fieldset>
            <div class="">
                <input type="file" class="mb-3" name="image">
            </div>

            <fieldset>
                <div class="form-group">

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <label class="control-label">Rating</label>
                        </div>

                        <div class="col-sm-12 col-md-10">

                            <div class="mb-3">
                                <select name="status" class="form-select" aria-label="Default select example">
                                    <div selected>
                                        <option value="1"{{ old('status') == 1 ? 'selected' : '' }}>Terrible</option>
                                        <option value="2"{{ old('status') == 2 ? 'selected' : '' }}>Watchable</option>
                                        <option value="3"{{ old('status', 3) == 3 ? 'selected' : '' }}>Best ever
                                        </option>
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
                            <i class="fa-solid fa-wrench"></i>
                            Create Movies
                        </button>
                    </div>
                </div>
            </div>
            @csrf
        </form>
    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script> --}}

    {{-- <script>
        var has_errors = {{ $errors->count() > 0 ? 'true' : 'false' }};

        if (has_errors) {
            Swal.fire({
                title: 'Errors',
                icon: 'error',
                html: jQuery("#ERROR_COPY").html(),
            })
        }
    </script> --}}
@stop
