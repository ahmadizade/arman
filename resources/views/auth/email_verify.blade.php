@extends("layouts.master")

@section("title")
    <title>تاییدیه ایمیل | فروشگاه سیوسه</title>
@endsection

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                @if($verify == 0)
                    <div class="alert alert-success text-center">ایمیل شما با موفقیت تایید شد</div>
                @elseif($verify == 1)
                    <div class="alert alert-danger text-center">این لینک منقضی شده است</div>
                @elseif($verify == 2)
                    <div class="alert alert-danger text-center">ایمیل شما تایید نشد</div>
                @endif
            </div>
        </div>
    </div>

@endsection
