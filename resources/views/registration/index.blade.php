@extends('layout.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="card-title">All User List</h1>
            <!-- start page title -->
            <div class="row">
                <div class="col-15">
                </div>
            </div>

            <div class="col-lg-13 col-sm-13">

                <div style="text-align:right">
                    <a href="/admin/register">
                        <button type="button" class="btn btn-primary" value="addPost">Add
                            {{-- <i class="fas fa-edit"></i> --}}
                        </button>
                    </a>
                </div>
                <br>
                <table id="datatable"
                    class="table align-middle table-nowrap table-hover table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Id </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>View</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                @csrf

            </div>
            @endsection('content')
            @section('custom-scripts')
            <script type="text/javascript">
            var ajaxCategoryURL = '{{route("admin.page")}}';

            var csrfToken = $("[name=_token]").val();

            var table = $('#datatable').DataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [6, 7, 8]
                }],
                "order": [
                    [0, 'ASC']
                ],
                "processing": true,
                "serverSide": true,
                "scrollX": true,

                "ajax": {
                    "url": ajaxCategoryURL,
                    "type": "POST",
                    "data": {
                        "_token": csrfToken,
                    }
                },

                "aoColumns": [{
                        "mData": "id"
                    },
                    {
                        "mData": "name"
                    },
                    {
                        "mData": "email"
                    },
                    {
                        "mData": "city"
                    },
                    {
                        "mData": "state"
                    },
                    {
                        "mData": "country"
                    },
                    {
                        "mData": "phone"
                    },
                    {
                        "mData": "image"
                    },
                    {
                        "mData": "edit"
                    },
                    {
                        "mData": "delete"
                    },
                    {
                        "mData": "view"
                    },
                    {
                        "mData": "created_at"
                    },
                    {
                        "mData": "updated_at"
                    },

                ]
            });
            </script>
            @endsection