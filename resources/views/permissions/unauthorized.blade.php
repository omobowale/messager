@if(Session::has("unauthorized_error"))
    <p class="alert alert-warning">{{ Session::get("unauthorized_error") }}</p>
    <a href="{{ URL::previous() }}">Go Back</a>
@endif