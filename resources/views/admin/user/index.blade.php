@extends('admin.master')

@section('title', 'trang chủ')

@section('main')
    <div class="content-wrapper">

        <section class="">
            <div class="contact-us">

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
                <div class="row">

                    
                        <table class="table table-dark table-hover table-bordered" id="examp" >

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>UserName</th>
                                    <th>Giới Tính</th>
                                    <th>Fullname</th>
                                    <th>Address</th>
                                    <th>Level.!</th>
                                    <th>Edit</th>
                                    <th>Remove</th>
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
                                            <h3>{{ $xike->email }}</h3>
                                        </td>
                                        <td>
                                            <h3>{{ $xike->status }}</h3>
                                        </td>
                                        <td>
                                            <h3>{{ $xike->fullname }}</h3>
                                        </td>
                                        <td>
                                            <h3>{{ $xike->address }}</h3>
                                        </td>
                                        <td>
                                            <h4>{{ $xike->level }}</h4>
                                        </td>
                                        <td><button><a class="text-warning"
                                                    href="{{ route('admin.user.edit', ['id' => $xike->id]) }}">Edit</a></button>
                                        </td>
                                        <td><button onclick="deleteItem(this)" data-id="{{ $xike->id }}">Delete</button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                  
                </div>

            </div>
        </section>
    </div>
    <script>
        // remove
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
                            url: `/admin/user/destroy/` + id,
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
        //end remove
    </script>
@stop
