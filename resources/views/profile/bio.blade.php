@extends("layouts.master")

@section("title")
    <title>بیوگرافی فروشگاه | فروشگاه سیوسه</title>
@endsection

@section("content")

    <div class="container">
        <div class="row">
           @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card shadow mt-3">
                    <div class="card-header p-3">
                        <h3 class="mb-0 font-14 float-right">بیوگرافی فروشگاه</h3>
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
                                <form action="{{ route("profile_bio_action") }}" method="post">
                                    <div class="form-group">
                                        <textarea class="form-control" name="bio" id="bio" cols="30" rows="8" placeholder="بیوگرافی فروشگاه">{{ old("bio") ?? $bio->about }}</textarea>
                                    </div>
                                    <div class="form-group text-left">
                                        <button class="btn btn-primary">ثبت</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
