@extends('admin.master')

@section('title', 'trang add sản phẩm')

@section('main')

    <div class="content-wrapper ">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card contact-us">

                        <nav aria-label="Page navigation example ">
                            <ul class="pagination ">
                                <li class="page-item"><a class="page-link" href="{{ route('admin.category.index') }}">

                                        <div class="box1">
                                            <div class="content "><i class="fa-solid fa-house-chimney fa-2xl"
                                                    style="color: #ffaacc;"></i></div>
                                        </div>
                                    </a></li>
                            </ul>
                        </nav>
                        <div class="card-header">
                            <h2>Quản lí thể loại</h2>
                        </div>
                        <div class="card-body">
                            {{-- messengers --}}
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
                            {{-- messengers --}}

                            <form role="form" action="{{ route('admin.category.store') }}" method="POST" class="mx-4 ">

                                <div class="mb-3">
                                    <label class="form-label">Tên Thể Loại</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Đường dẫn</label>
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mô tả thể loại</label>
                                    <textarea type="text" class="form-control font" name="description">{{ old('description') }}</textarea>
                                </div>

                                <div class="d-block my-5">
                                    <div class="form-check">
                                        <h2>Active</h2>
                                        <div class="toggleWrapper">
                                            <input type="radio" name="status" class="mobileToggle" id="toggle1"
                                                value="1">
                                            <label for="toggle1" class="form-label"></label>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <h2>Unactive</h2>
                                        <div class="toggleWrapper">
                                            <input type="radio" name="status" class="mobileToggle" id="toggle2"
                                                value="2"{{ old('status', 2) == 2 ? 'checked' : '' }}>
                                            <label for="toggle2" class="form-label"></label>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class=""><i class="fa-solid fa-gear fa-xl"></i></button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
