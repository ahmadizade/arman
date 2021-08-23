@if (Session::has("errors"))
    <div class="alert alert-danger mb-2 admin-rtl text-center">
        <ul class="mb-0">
            <li>{{ Session::get("errors") }}</li>
        </ul>
    </div>
@endif
@if(Session::has("status"))
    <div class="alert alert-success text-center mb-2">{{ Session::get("status") }}</div>
@endif
