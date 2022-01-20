@if (Session::has("errors"))
    <div class="alert alert-danger mb-2">
        <ul class="mb-0 text-center">
            <li>{{ Session::get("errors") }}</li>
        </ul>
    </div>
@endif
@if(Session::has("status"))
    <div class="alert alert-success text-center mb-2">{{ Session::get("status") }}</div>
@endif
