@extends('admin.master')

@section('title', 'trang chủ')

@section('main')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="content-wrapper">

        <!-- /.content-header -->

        <!-- Main content -->
        <section class=" ">
            <div class="contact-us  ">

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
                <!-- Main row -->
                <table class="table table-dark table-hover table-bordered" id="example">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Review</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($users as $xike)
                            <tr>
                                @php
                                    $hinh = $xike->image == null || !file_exists(public_path('image/' . $xike->image)) ? '' : asset('image/' . $xike->image);
                                @endphp

                                <td>
                                    <h3>{{ $stt++ }}</h3>
                                </td>
                                <td>
                                    <h3>{{ $xike->name }}</h3>
                                </td>
                                <td>
                                    <h3>{{ number_format($xike->price,0,"",".") }} VND</h3>
                                </td>
                                <td><img src="{{ $hinh }}" width="200px" /></td>
                                <td>
                                    <h3>{{ $xike->review }}</h3>
                                </td>
                                <td>
                                    <h3>{{ $xike->status }}</h3>
                                </td>
                                <td><button><a
                                            href="{{ route('admin.product.edit', ['id' => $xike->id]) }}">Edit</a></button>
                                </td>

                                <td><button onclick="deleteItem(this)" data-id="{{ $xike->id }}">Delete</button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

        </section>

    </div>


@stop

<script>
    function deleteItem(e) {

        let id = e.getAttribute('data-id');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        Swal.fire({
            title: 'Are you sure ?',
            text: "You won't be able to revert this !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                if (result.isConfirmed) {

                    $.ajax({
                        type: 'DELETE',
                        url: `/admin/product/destroy/` + id,
                        data: {
                            "_token": "{{ csrf_token() }}",

                        },
                        success: function(data) {
                            if (data.success) {
                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    "success"
                                ).then((result) => {

                                    location.reload();
                                });
                                $("#" + id + "").remove(); // you can add name div to remove
                            }
                        }
                    });
                }
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                );
            }
        });
    }
</script>
