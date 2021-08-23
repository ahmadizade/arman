@if(isset($category))
    <section class="categories-area pb-40">
    <div class="container">
        <div class="section-title">
            <h2>دسته بندی ها</h2>
        </div>
        <div class="row">
            @foreach($category as $item)
                <div class="col-lg-2 col-sm-4 col-md-4">
                    <div class="single-categories-box">
                        <img src="/uploads/category/{{$item->image}}" alt="{{$item->name ?? "نا معلوم"}}">
                        <h3>{{$item->name ?? "نا معلوم"}}</h3>
                        <a href="{{route('single_category',["slug" => $item->slug])}}" class="link-btn"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
