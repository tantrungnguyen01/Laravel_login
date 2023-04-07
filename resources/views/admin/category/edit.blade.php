@extends('admin.master')

@section('title', 'trang sửa sản phẩm')

@section('main')
    <div class="content-wrapper">

        {{-- messengers --}}
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
        {{-- messengers --}}

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card contact-us">
                        <div class="card-header">Quản Lý Thể Loại</div>
                        <div class="card-body">
                            <form role="form" action="{{ route('admin.category.update', ['id' => $data->id]) }}"
                                method="POST" class="mx-4 ">

                                <div class="mb-3">
                                    <label class="form-label">Tên Thể Loại</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $data->name) }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Đường dẫn</label>
                                    <input type="text" class="form-control" name="slug"
                                        value="{{ old('slug', $data->slug) }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mô tả thể loại</label>
                                    <textarea type="text" class="form-control" name="description">{{ old('description', $data->description) }}</textarea>
                                </div>

                                <div class="d-block">
                                    <div class="form-check">
                                        <h2>Active</h2>
                                        <div class="toggleWrapper ">
                                            <input type="radio" name="status" class="mobileToggle" id="toggle1"
                                                value="1"{{ old('status', $data->status) == 1 ? 'checked' : '' }}>
                                            <label for="toggle1" class="form-label"></label>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <h2>Unactive</h2>
                                        <div class="toggleWrapper">
                                            <input type="radio" name="status" class="mobileToggle" id="toggle2"
                                                value="2"{{ old('status', $data->status) == 2 ? 'checked' : '' }}>
                                            <label for="toggle2" class="form-label"></label>
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class=""><i
                                        class="fa-solid fa-up-right-and-down-left-from-center"></i></button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}

@stop
