@extends("layouts.master")

@section("title")
    <title>کاربر طلایی | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container mt-3">
        <div class="row">
           @include("sidebar")
            <div class="col-12 col-lg-9">
                <div class="card shadow mt-3">
                    <div class="card-header p-3">
                        <h3 class="mb-0 font-14 float-right">تماس با ما</h3>
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
                               test
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
