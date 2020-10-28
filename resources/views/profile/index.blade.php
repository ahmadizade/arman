@extends("layouts.master")

@section("title")
    <title>پیشخوان | ثمین تخفیف</title>
@endsection
@section("extra_css")
    <link rel="stylesheet" href="/css/chart.css">
@endsection

@section("content")

    <div class="container mt-3">
        <div class="row">
            @include("profile.sidebar")
            <div class="col-12 col-lg-9 mt-3">
                <canvas id="myChart" width="400" height="150"></canvas>
            </div>
        </div>
    </div>

@endsection

@section('extra_js')
    <script src="/js/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['کل دریافتی', 'سود دریافتی'],
                datasets: [{
                    data: [80000000, 34000000],
                    backgroundColor: [
                        'rgba(253, 126, 20, 0.6)',
                        'rgba(43, 62, 151, 0.6)',
                    ],
                    borderColor: [
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                    ],
                    borderWidth: 3,
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'چارت فروش و سود حاصله شما از وب سایت',
                    fontFamily: 'iranyekan',
                    fontWeight: 'normal',
                    fontSize: 15
                },
                legend: {
                    labels: {
                        fontFamily: 'iranyekan',
                        fontWeight: 'normal',
                        fontSize: 12,
                    }
                },
            }
        });
    </script>
@endsection
