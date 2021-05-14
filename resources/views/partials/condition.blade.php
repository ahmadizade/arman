@if ($errors->any())
    <div class="alert alert-danger p-2 mb-2">
        <ul class="mb-0" style="list-style-position: inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has("status"))
    <div class="alert text-center alert-success p-2 mb-2">{{ Session::get("status") }}</div>
@endif
@if(Session::has("error"))
    <div class="alert text-center alert-danger p-2 mb-2">{{ Session::get("error") }}</div>
@endif
