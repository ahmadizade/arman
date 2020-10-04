@extends("admin.layouts.master")
@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
@endsection
@section("extra_css")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
{{--    <link rel="stylesheet" type="text/css" href="/admin/css/buttons.dataTables.min.css">--}}
@endsection
@section("content")
    <!-- Page Wrapper -->
    <div id="wrapper">
    @include("admin.partials.sidebar")

    <!-- Content Wrapper -->


        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                </div>


                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">نمودار عضویت کاربران در وب سایت به تفکیک
                                ماههای سال</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                     aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <table id="user_table" class="table table-sm table-hover table-borderless table-striped"
                                   width="100%">
                                <thead class="bg-primary text-white shadow">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">role</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Usre_Mode</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">created_at</th>
                                    <th scope="col">EDIT</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("extra_js")
{{--    <script src="/admin/js/dataTables.buttons.min.js"></script>--}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                // pagingType: "numbers",
                bLengthChange: false,
                pageLength: 10,
                // "pagingType":       "full_numbers",
                // "lengthMenu":       [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "searching" :       true,
                "scrollY":          400,
                "scrollCollapse":   true,
                // "jQueryUI":         true,
                ajax: {
                    // dataSrc: 'data'
                    // dataSrc: 'staff'
                    dataType: 'json',
                    type: 'GET',
                    url: '/tahator/admin-users/get-user',
                },
                // buttons: [
                //     {extend: 'create', editor: myEditor},
                //     {extend: 'edit', editor: myEditor},
                //     {extend: 'remove', editor: myEditor}
                // ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'role', name: 'role'},
                    {data: 'email', name: 'email'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'user_mode', name: 'user_mode'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {
                        data: null,
                        render: function (data, type, row) {
                            return '<div class="btn-group-vertical btn-group-sm"><button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button><button type="button" class="btn btn-sm btn-success">EDIT</button></div><!-- Modal --><div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="test2">' + "سامانه کنترل کاربر" + '</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">شما را حال پاک کردن کاربر ... هستید! آیا اطمینان دارید؟</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button><a href="{{route('delete_user_action')}}" type="button" class="btn  btn-danger">DELETE</a></div></div></div></div>';
                        }
                    }
                ]
            });
        });
    </script>
@endsection