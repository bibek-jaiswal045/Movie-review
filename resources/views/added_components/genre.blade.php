<select class="js-example-basic-multiple form-control" name="genre[]" multiple="multiple" style="height: 40px">

        @foreach ($genres as $genre)
            <option value="{{ $genre->genre }}">{{ $genre->genre }}</option>
        @endforeach

</select>



@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        })
    </script>
@endsection
