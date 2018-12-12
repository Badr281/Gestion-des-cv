@if(session()->has('enregistrement')) 

 <div class="container">
   <div class="row">
     <div class="col-sm-6 offset-3">
            <div class="alert alert-success ">
                {{session()->get('enregistrement') }}
            </div>
     </div>
   </div>
</div>

   @endif 
   @if(session()->has('edition'))

    <div class="container">
     <div class="row">
       <div class="col-md-6 offset-3 text-center">
          <div class="alert alert-success " st > {{ session()->get('edition') }} </div>
       </div>
     </div>
    </div>
   @endif
    
 