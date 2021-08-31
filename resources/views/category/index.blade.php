@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header text-right">
{{--            <h3 class="card-title">List of Rooms</h3>--}}
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryCreateModal">
               Add Category
           </button>

            <!--New  Modal -->
            <div class="modal fade" id="categoryCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Enter Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <form  method="POST" name="category-form" action="{{ route('category.create')}}" role="form" enctype="multipart/form-data" >
                                @csrf

                            <div class="row">
                                   <div class="col-md-12">
                                    <div class="form-group primary">
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <input type="text" class="form-control" id="category" name="category">
                                        <span class="text-danger error-block"></span>
                                    </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary submit">Enter</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

            {{-- end modal  --}}


            {{-- edit modal  --}}

            <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="category-edit-modal-body">

                        </div>


                    </div>
                </div>
            </div>

            {{-- end modal  --}}


        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Category</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $key=>$category)
                    <tr>
                        <td>
                            {{$key+1}}
                        </td>

                        <td>{{ $category->name}}</td>


                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="javascript:;" data-href={{ route('category.edit', $category->id) }} class="btn btn-outline-success edit-modal-category" >
                                    <i class="fas fa-edit"></i>
                                </a> &nbsp;

                                <a href="{{ route('category.delete',$category->id) }}" onclick="return confirm('Are you sure?')" title="delete" class="btn btn-outline-danger"><i class="fas fa-trash"></i> </a>
                            </div>
                        </td>


                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection

@push('scripts')

<script>

 $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        var app = {
            initialize: function() {
                $("form[name='category-form']").submit(app.createCategory);
                $('#example1').on('click', '.edit-modal-category', function() {
                    var url = $(this).data('href');
                    app.showEditModal(url);
                });
                $(document).on('submit', '.category-edit-form', function(e) {
                    // e.preventDefault();
                    app.editCategory(e)
                });

            },
            showEditModal: function(url) {
                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        $('#category-edit-modal-body').empty().append(res.message);
                        $('#editCategory').modal('show');
                    }
                });
            },


            createCategory: function(e) {
                e.preventDefault();
                var category = $('#category').val();
                $.ajax({
                    url: "{{ route('category.create')}}",
                    cache: false,
                    method: 'POST',
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'category': category,
                    },
                    success: function(response) {

                        if(response.status) {
                            location.reload();
                            $('#categoryCreateModal').modal('hide');

                        } else {
                            if(response.message.hasOwnProperty('category')) {
                                $('.error-block').html(response.message.category);

                            }
                        }
                    },
                    error: function(data) {
                        var result = data.responseJSON;
                        console.log(result);
                        $('.error-block').html(result.errors.category);
                    }
                })
            },
            editCategory: function(e) {
                e.preventDefault();
                var category = $('#category-edit-value').val();
                var categoryId = $('#categoryId').val();
                $.ajax({
                    url: "{{ route('category.update')}}",
                    cache: false,
                    method: 'POST',
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'category': category,
                        'categoryId': categoryId,
                    },
                    success: function(response) {

                        if(response.status) {
                            location.reload();
                            $('#editCategory').modal('hide');

                        } else {
                            if(response.message.hasOwnProperty('category')) {
                                $('.error-block').html(response.message.category);

                            }
                        }
                    },
                    error: function(data) {
                        var result = data.responseJSON;
                        $('.error-block').html(result.errors.category);
                    }
                })
            }

        };
        app.initialize();
    </script>

@endpush
