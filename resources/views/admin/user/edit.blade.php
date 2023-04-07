@extends('admin.master')

@section('title', 'trang sửa sản phẩm')

@section('main')
<div class="content-wrapper">
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="">
        <div class="contact-us ">

            <!-- Main row -->

            <div class="card-body table-responsive p-0 mb-4" style="height: 420px; width:700px  ">
                <table class="table table-head-fixed text-nowrap">
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
                    <form role="form" action="{{route('admin.user.update',['id'=>$data->id])}}" method="POST">
  
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="text" name="email" value="{{ old('email',$data->email) }}" disabled="disabled" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password"   class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">xác nhận lại Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">fullname</label>
                                <input type="text" name="fullname" value="{{ old('fullname',$data->fullname) }}" class="form-control"
                                    id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"> phone</label>
                                <input type="text" name="phone" value="{{ old('phone',$data->phone) }}" class="form-control"
                                    id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">address</label>
                                <input type="text" name="address" value="{{ old('address',$data->address) }}" class="form-control"
                                    id="exampleInputPassword1">
                            </div>
                    
                            {{-- <div class="mb-3">
                                <select name="gender" class="form-select" aria-label="Default select example">
                                    <option selected>gender</option>
                                    <option value="1"{{ old('gender') == 1 ? 'selected' : '' }}>male</option>
                                    <option value="2"{{ old('gender') == 2 ? 'selected' : '' }}>female</option>
                                </select>
                            </div> --}}
                    
                    
                            <div class="d-block">
                                <div class="form-check">
                                    <h5>Nam</h5>
                                    <div class="toggleWrapper ">
                                        <input type="radio" name="status" class="mobileToggle" id="toggle1"
                                            value="Nam"{{ old('status',$data->status) == 'Nam' ? 'checked' : '' }}>
                                        <label for="toggle1" class="form-label"></label>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <h5>Nữ</h5>
                                    <div class="toggleWrapper">
                                        <input type="radio" name="status" class="mobileToggle" id="toggle2"
                                            value="Nữ"{{ old('status',$data->status) == 'Nữ' ? 'checked' : '' }}>
                                        <label for="toggle2" class="form-label"></label>
                                    </div>
                                </div>

                            </div>
                            <select name="level" class="my-5">
                                <option value="1">Admin</option>
                                <option value="2">Member</option>
                            </select>
                         
                    
                    
                    
                        </div>
                        <!-- /.card-body -->
                    
                        <div class="card-footer">
                            <button type="submit" >Update sản phẩm</button>
                        </div>
                        @csrf
                    </form>
                    
                </table>
                
            </div>
            

         
        </div>
    </section>
    <!-- /.content -->
</div>



@stop
