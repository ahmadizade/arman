@extends("layouts.master")

@section("title")
    <title>نشان شده ها | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container">
        <div class="row">
           @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card shadow mt-3">
                    <div class="card-header p-3">
                        <h3 class="mb-0 font-14 float-right">نشان شده ها</h3>
                    </div>
                    <div class="card-body p-3">
                        @if ($errors->any())
                            <div class="alert alert-danger mb-2">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has("status"))
                            <div class="alert alert-success text-center mb-2">{{ Session::get("status") }}</div>
                        @endif
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                @if(isset($bookmark) && count($bookmark) > 0)
                                    <table class="table table-bordered table-sm">
                                        @php $i = 1 @endphp
                                        <tr class="text-center">
                                            <td>ردیف</td>
                                            <td>نام فروشگاه</td>
                                            <td>عملیات</td>
                                        </tr>
                                        @foreach($bookmark as $item)
                                            <tr class="text-center">
                                                <td>{{ $i }}</td>
                                                <td> <span class="text-muted font-11">فروشگاه</span> {{ $item->store->shop }} @if(strlen($item->store->branch) > 0) <span class="text-muted font-11">شعبه</span> {{ $item->store->branch }} @endif</td>
                                                <td><a href="#" class="text-danger delete-bookmark" data-id="{{ $item->store_id }}">حذف</a></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <div class="alert alert-danger mt-2 mb-2 text-center">شما هیچ فروشگاه نشان شده ای ندارید</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {
            $(".delete-bookmark").on("click", function (e) {
                $(this).html("<span class='fa fa-spinner fa-spin font-20 px-2'></span>");
                $.ajax({
                    url: '{{ route("profile_bookmark_delete") }}',
                    type: 'POST',
                    data: {"store": $(this).attr("data-id")},
                    success: function (data) {
                        if (data.status == "0") {
                            Swal.fire({
                                position: 'center-center',
                                icon: 'warning',
                                text: data.desc,
                                showConfirmButton: false,
                                timer: 3000
                            })
                        } else if (data.status == "1") {
                            Swal.fire({
                                position: 'center-center',
                                icon: 'success',
                                text: data.desc,
                                showConfirmButton: false,
                                timer: 3000
                            });
                            setTimeout(function () {
                                window.location.reload();
                            }, 3000);
                        }
                        $(".delete-bookmark").html('حذف');
                    },
                });
                e.preventDefault();
            });
        });
    </script>
@endsection
