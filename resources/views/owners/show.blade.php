@extends("app")

@section("title"){{
    "{$owner->fullName()}' Page"
}}@endsection

@section("content")
    <div class="list-group">
        @if ($owner->count() > 0)
            @include("../_partials/owner", ["owner" => $owner])
        @else
            <h2>No owner found.</h2>
        @endif
    </div>
@endsection