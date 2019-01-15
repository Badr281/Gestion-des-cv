@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1> La liste de mes cv

            <span class="float-right col-md-2 col-offset-4">
                <a href="{{url('cvs/create')}}" class="btn btn-primary  width100">Nouveau</a>
            </span>
            </h1>
            
            
        </div>
    </div>
    <br>
    <div class="row">
        @foreach($cvs as $cv)
        <div class="col-sm-6 col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('storage/'.$cv->photo) }}" class="card-img-top">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{$cv->title}}</h3>
                        <br><br> 
                        <form method="post" action="{{ url('cvs/'.$cv->id) }}" class="text-center">
                            @csrf @method('delete')
                        
                            <a href="{{  url('cvs/'.$cv->id)  }}" class="btn btn-primary" role="button">show</a>
                            @can('update',$cv)
                            <a href="{{url('cvs/'.$cv->id.'/edit')}}" class="btn btn-success" role="button">Edit</a>
                            @endcan
                            @can('delete',$cv)
                            <button href="submit" class="btn btn-warning">delete</button>
                            @endcan
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<!-- <script> // $(document).start( // $("#edit").click(fuction(){ //
$("#list").hide(); // }); // $("#delete").click(fuction(){ // $("#list").hide();
// }); // ); $('.slide').textSlider({ timeout: 2000, slideTime: 750, loop: 1 });
</script> -->

@endsection