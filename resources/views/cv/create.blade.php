@extends('layouts.app') 

@section('content')
<!-- @if($errors->any())
<div class="alert alert-danger">  
@foreach($errors->all() as $indication)
       
            <li> {{$indication}} </li>
     
    
@endforeach
</div>
@endif -->
<!-- @if($errors->any())
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
@endif -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('cvs')}}" method="post"  > 
            @csrf
         <!-- {{csrf_field()}} -->
                <div class="form-group  ">
                    <label for="">Titre :</label>
                    <input type="text" class="form-control @if($errors->get('titre') )  is-valid @endif " name="titre" value="{{old('titre')}}">
                   
                    
                    @if($errors->get('titre'))
        
                        @foreach ($errors->get('titre') as $error)

                           
                                <li >{{ $error }}</li>
                           
                        @endforeach
                 @endif
                </div>
           
                <div class="form-group">
                    <label for="">Présentation :</label>
                    <textarea class="form-control @if($errors->get('presentation') )  is-valid @endif" name="presentation" cols="30" rows="5" >{{old('presentation')}}</textarea>
           @if($errors->get('presentation'))

           @foreach($errors->get('presentation') as $error )

               
                <li>{{$error}}</li>
              

           @endforeach
           @endif
                </div>

                <div class="form-group">
                    <input
                        type="submit"
                        class="form-control btn btn-primary"
                        name="submit"
                        value="enregister">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection