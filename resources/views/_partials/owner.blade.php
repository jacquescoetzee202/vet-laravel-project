<a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">{{$owner->fullName()}}</h5>
        <small>Last updated : {{$owner->updated_at}}</small>
    </div>
    <p class="mb-1">User created : {{$owner->created_at}}</p>
</a>