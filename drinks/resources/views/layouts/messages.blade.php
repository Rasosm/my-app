 <div class="container">
     <div class="row justify-content-center">

         @if(Session::has('ok'))
         <h2 class="alert alert-success">{{ Session::get('ok') }}</h2>
         @endif

         @if(Session::has('not'))
         <h2 class="alert alert-danger">{{ Session::get('not') }}</h2>
         @endif


         @if($errors)
         @foreach ($errors->all() as $message)
         <h2 class="alert alert-danger">{{ $message }}</h2>
         @endforeach
         @endif
     </div>
 </div>
