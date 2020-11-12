
@extends("app")

@section("title"){{
    "Owners Directory"
}}@endsection

@section("content")
    <div class="list-group">
        @foreach (App\Models\Owner::all() as $owner)
            @include("_partials/owner", ["owner" => $owner])
        @endforeach
    </div>
@endsection
 
