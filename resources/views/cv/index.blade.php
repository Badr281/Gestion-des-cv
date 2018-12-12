@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12 ">
    <!-- test de message de validation -->
    
 @include('partial.message')
    <div class="col">
        <a href="{{url('cvs/create')}}" class="btn btn-danger float-right" style="float: left;">Nouveau cv</a>
        <br><br>
    </div>
</div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Presentation</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
          
                    @foreach($cvs as $cv)
          
                    <tr>
                        <td>{{$cv->title}} <br> {{$cv->user->name}} </td>
                        <td>{{$cv->presentation}}</td>
                        <td>{{$cv->created_at}}</td>
                        <td>
                            <form action="{{ url('cvs/'.$cv->id) }}" method="post">
          
                                @csrf @method('delete')
                                <!-- {{method_field('Delete')}} -->
          
                                <div class="btn-group btn-group-justified">
                                    <a href="" class="btn btn-primary" id="b">Detail</a>
                                    <a href="{{url('cvs/'.$cv->id.'/edit')}} " class="btn btn-default" id="edit">Edit</a>
                                    <button type="submit" class="btn btn-success float-right" id="delete">Delete
                                    </button>
                                </div>
          
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
          
      </div> 
         </div>
</div>
<!-- <script>
           
        // $(document).start(
        //     $("#edit").click(fuction(){
        //         $("#list").hide();
        //     });
        //     $("#delete").click(fuction(){
        //         $("#list").hide();
        //     });
        // );
        $('.slide').textSlider({

timeout: 2000,
slideTime: 750,
loop: 1

});

</script> -->

@endsection