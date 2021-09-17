@if(isset($category))
    <section class="categories-area pb-40">
    <div class="container">
        <div class="section-title">
            <h3>دسته بندی ها</h3>
        </div>
        <div class="row d-flex justify-content-center">
            @foreach($category as $item)
                <div class="col-lg-4 col-sm-4 col-md-4">
                    <div class="single-categories-box">
                        <img src="/uploads/category/{{$item->image}}" alt="{{$item->name ?? "نا معلوم"}}" style="max-width:200px;max-height: 200px;">
                        <h3>{{$item->name ?? "نا معلوم"}}</h3>
                        <a href="{{route('single_category',["slug" => $item->slug])}}" class="link-btn"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
