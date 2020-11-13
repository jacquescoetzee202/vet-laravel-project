@extends("app")

@section("title"){{
    "Owners Directory"
}}@endsection

@section("content")
    <div class="list-group">
        @if ($owners->count() > 0)
            @foreach ($owners as $owner)
                @include("../_partials/owner", ["owner" => $owner])
            @endforeach
        @else
            <h2>No owners found.</h2>
        @endif
    </div>
@endsection