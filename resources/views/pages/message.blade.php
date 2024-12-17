@if (!empty(session('success')))
<div class="alert alert-success " role="alert">
  {{session('success')}}
</div>
@else
<div class="alert alert-success " role="alert">
    success or fail notification here
  </div>
@endif



