@extends('app')
@section('title')
Status
@endsection

@section('content')
<div class="d-flex justify-content-between mb-4">

    <h1>All Statuses</h1>
    
    <a href="{{route('status.create')}}" class="btn btn-primary">Add Movie Status</a>
    
</div>
@foreach ($statuses as $status)
<ul class="d-flex justify-content-between py-1">
        
    <li>
        {{$status->status}}


    </li>

    <form action="{{route('status.destroy',$status->id)}}" method="POST">
    
        @csrf
        @method('DELETE')

        <button class="btn btn-danger">Delete</button>
        
        
    
    </form>
</ul>
    @endforeach



@endsection