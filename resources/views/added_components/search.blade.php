<form method="GET" action="{{route('clientindex' )}}" class="my-5">
    <input type="text" name="search" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search your movie" value="{{request('search')}}">
</form>