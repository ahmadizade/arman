<div class="widget-posts dt-sn dt-sl mb-3">
    <div class="title-sidebar dt-sl mb-3">
        <h3>جدیدترین نوشته ها</h3>
    </div>
    <div class="content-sidebar dt-sl">
        @if (isset($lastPost) && $lastPost[0]->id > 0)
            @foreach($lastPost->take(4) as $item)
                <div class="item">
                    <div class="item-inner">
                        <div class="item-thumb">
                            <a href="{{route('single_mag' , $item->slug)}}" class="img-holder"
                               style="background-image: url('/uploads/blog/thumbnail/{{$item->thumbnail}}')"></a>
                        </div>
                        <p class="title">
                            <a href="{{route('single_mag' , $item->slug)}}">{{$item->title}}</a>
                        </p>
                        <div class="item-meta">
                            <span class="time">{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<div class="dt-sn dt-sl mb-3">
    <div class="section-title text-sm-title title-wide no-after-title-wide mb-1">
        <h2>آخرین مطالب</h2>
    </div>
    <ul class="category-list">
        @if (isset($lastPost) && $lastPost[0]->id > 0)
            @foreach($lastPost->take(6) as $item)
                <li><a href="{{route('single_mag' , $item->slug)}}">{{$item->title}}</a></li>
            @endforeach
        @endif
    </ul>
</div>
<div class="widget-posts dt-sn dt-sl mb-3">
    <div class="section-title text-sm-title title-wide no-after-title-wide mb-1">
        <h2>پربازدیدترین ها</h2>
    </div>
    <div class="content-sidebar dt-sl">
        @if (isset($bestPost) && $bestPost[0]->id > 0)
            @foreach($bestPost->take(4) as $item)
                <div class="item">
                    <div class="item-inner">
                        <div class="item-thumb">
                            <a href="{{route('single_mag' , $item->slug)}}" class="img-holder"
                               style="background-image: url('/uploads/blog/thumbnail/{{$item->thumbnail}}')"></a>
                        </div>
                        <p class="title">
                            <a href="{{route('single_mag' , $item->slug)}}">{{$item->title}}</a>
                        </p>
                        <div class="item-meta">
                            <span class="time">{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
