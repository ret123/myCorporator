@if(session('msg'))
<div class="alert alert-success">
       {{ session('msg') }}
   </div>
@endif

@if(session('err'))
<div class="alert alert-danger">
       {{ session('err') }}
   </div>
@endif

@if(session('len'))
<div class="alert alert-success">
       {{ session('len') }}
   </div>
@endif

@if(session('tm'))
<div class="alert alert-success">
       {{ session('tm') }}
   </div>
@endif
