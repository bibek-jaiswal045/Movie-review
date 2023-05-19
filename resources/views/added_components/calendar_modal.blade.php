{{-- <div id="calendar"></div> --}}
@foreach ($movies as $movie)
<div class="modal fade" id="{{$movie->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
                
            <h5 class="modal-title" id="staticBackdropLabel">{{$movie->name}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Casts: {{$movie->casts}}</p>
            <p>Genre: {{$movie->genre}}</p>
            <p>Released Date: {!! htmlspecialchars_decode(date(' F j, Y', strtotime($movie->released_date))) !!}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach