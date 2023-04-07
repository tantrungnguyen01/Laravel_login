@extends('admin.master')

@section('title', 'trang chủ')

@section('main')
    <div class="content-wrapper">

        <section class="">
            <div class="contact-us ">

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

                <table  class="table table-dark table-hover table-bordered" id="examp">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Active</th>
                            <th scope="col">Time-Create</th>
                            <th scope="col">Time-Edit</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($users as $xike)
                            <tr>


                                <td>
                                    <h2>{{ $stt++ }}</h2>
                                </td>
                                <td>
                                    <h2>{{ $xike->name }}</h2>
                                </td>
                                <td>
                                    <h2>{{ $xike->slug }}</h2>
                                </td>
                                <td>
                                    <h2>{{ $xike->description }}</h2>
                                </td>
                                <td>
                                    <h2>{{ $xike->status }}</h2>
                                </td>
                                <td>
                                    <h5>{{ date("d-m-Y H:i:s",strtotime($xike->created_at))  }} </h5>
                                </td>
                                <td>
                                    <h5>{{ date("d-m-Y H:i:s",strtotime($xike->updated_at))  }} </h5>
                                </td>
                                <td><button><a class="text-info"
                                            href="{{ route('admin.category.edit', ['id' => $xike->id]) }}">Edit</a></button>
                                </td>
                                <td><button onclick="deleteItem(this)" data-id="{{ $xike->id }}">Delete</button></td>

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
                        url: `/admin/category/destroy/` + id,
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
