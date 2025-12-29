<div class="modal fade" id="myModal-{{$movie->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete the movie?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" class="mx-3">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">Yes</button>


                </form>
            </div>
           
        </div>
    </div>
</div>
