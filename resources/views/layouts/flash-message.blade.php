@if(Session::has('flash_message'))
   <div class="container mt-3">
         <div class="row">
            <div class="col-md-8 offset-md-2">              
               <div class="alert alert-success alert-dismissible">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <em> {!! session('flash_message') !!}</em>
               </div>
            </div>
         </div>   
   </div>
@endif