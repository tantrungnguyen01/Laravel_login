@extends('admin.master')

@section('title', 'trang add user')

@section('main')


    <div class="content-wrapper font">
        
        <!-- Main content -->
        <section class="">
            <div class="contact-us">

                @include('sweetalert::alert')

                {{-- messengers --}}
                @if ($errors->count() > 0)
                    <div id="ERROR_COPY" style="display:none"  class="alert alert-danger">

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
                <nav aria-label="Page navigation example ">
                    <ul class="pagination ">
                        <li class="page-item"><a class="page-link" href="{{ route('admin.user.index') }}">

                                <div class="box1">
                                    <div class="content "><i class="fa-solid fa-house-chimney fa-2xl"
                                            style="color: #ffaacc;"></i></div>
                                </div>
                            </a></li>
                    </ul>
                </nav>
                <div class="card-body table-responsive p-0 mb-4 " style="height: 620px; width:700px  ">

                    <table class="table table-head-fixed text-nowrap">
                        <form role="form" action="{{ route('admin.user.store') }}" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                                        id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">xác nhận lại Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">fullname</label>
                                    <input type="text" name="fullname" value="{{ old('fullname') }}" class="form-control"
                                        id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> phone</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"
                                        id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">address</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control"
                                        id="exampleInputPassword1">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="font">Gender</label>
                                    <select name="gender" class="form-select font" aria-label="Default select example">

                                        <option value="1"{{ old('gender') == 1 ? 'selected' : '' }}>male</option>
                                        <option value="2"{{ old('gender') == 2 ? 'selected' : '' }}>female</option>
                                    </select>
                                </div>


                                <div class="d-block">
                                    <div class="form-check">
                                        <h2>Nam</h2>
                                        <div class="toggleWrapper ">
                                            <input type="radio" name="status" class="mobileToggle" id="toggle1"
                                                value="Nam" {{ old('status', 'Nam') == 'Nam' ? 'checked' : '' }}>
                                            <label for="toggle1" class="form-label"></label>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <h2>Nữ</h2>
                                        <div class="toggleWrapper">
                                            <input type="radio" name="status" class="mobileToggle" id="toggle2"
                                                value="Nữ">
                                            <label for="toggle2" class="form-label"></label>
                                        </div>
                                    </div>

                                </div>

                                <div>
                                    <label for="" class="font">Level</label>
                                    <select name="level" class="my-5 font">
                                        <option value="1">Admin</option>
                                        <option value="2">Member</option>
                                    </select>
                                </div>




                            </div>
                            <!-- /.card-body -->

                            <div class="footer">
                                <button id="fire" type="submit">Thêm User</button>
                            </div>
                            @csrf
                        </form>

                    </table>
                </div>
            </div>

        </section>

    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script> --}}
   


@stop
