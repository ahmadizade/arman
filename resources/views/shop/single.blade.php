@extends("layouts.master")

@section("title")
    <title>محصول شماره 1 | ثمین تخفیف</title>
@endsection
@section("extra_css")
    <link rel="stylesheet" href="/css/chart.css">
@endsection

@section("content")

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 col-lg-3">
                <img class="img-fluid" src="/uploads/products/{{ $result->image }}" alt="">
            </div>
            <div class="col-12 col-lg-9 mt-3">
                <canvas id="myChart" width="400" height="150"></canvas>
            </div>
        </div>
    </div>

@endsection
