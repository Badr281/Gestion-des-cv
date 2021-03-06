@extends('layouts.app')

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container">

    <form action="{{url('cvs/'.$cv->id)}}" method="post" enctype='multipart/form-data' >
    <input type="hidden" name="_method" value="PUT">
    @csrf
    <!-- <input type="hidden" name="_method" value="PUT"> -->
        <div class="group-form">
            <label >Title</label>
            <input type="text" class="form-control" name="titre" value="{{$cv->title,old('titre')}}"></div>
            
            <div class="group-form">
                <label >Presentation</label>
                <input type="text" class="form-control" name="presentation" value="{{$cv->presentation,old('presentatation')}} "></div>
                 <label for="">Picture</label>
            <div >
                     <input type="file" name="photo">  
            </div> 
                <div class="group-form">
                        <br>
                    <input type="submit" value="Update" class="form-control btn btn-danger">
                </div>
                </form>
        </div>
@endsection