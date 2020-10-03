@extends("admin.layouts.master")
@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
@endsection
@section("extra_css")
{{--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
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


                <div class="col-xl-12 col-lg-12">
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
                            <table id="user_table" class="table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">verified</th>
                                    <th scope="col">permission</th>
                                    <th scope="col">user_mode</th>
                                    <th scope="col">mobile</th>
                                    <th scope="col">email</th>
                                    <th scope="col">status</th>
{{--                                    <th scope="col">password</th>--}}
                                    <th scope="col">credit</th>
                                    <th scope="col">created_at</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("extra_js")
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {

            $('#user_table').DataTable({
                colReorder: true,
                responsive: true,
                processing: true,
                serverSide: true,
                // fixedHeader : true,
                ajax: {
                    dataType: 'json',
                    type: "POST",
                    url:'{{route('get_user')}}'
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'role', name: 'role'},
                    {data: 'verified', name: 'verified'},
                    {data: 'permission', name: 'permission'},
                    {data: 'user_mode', name: 'user_mode'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'email', name: 'email'},
                    {data: 'status', name: 'status'},
                    // {data: 'password', name: 'password'},
                    {data: 'credit', name: 'credit'},
                    {data: 'created_at', name: 'created_at'},
                ]
            });
        });
    </script>
@endsection
