<select class="js-example-basic-multiple form-control" name="casts[]" multiple="multiple" style="height: 40px">
   
        @foreach ($casts as $cast)
            <option value="{{ $cast->name }}">
                {{ $cast->name }}</option>
        @endforeach


</select>



@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        })
    </script>
@endsection
