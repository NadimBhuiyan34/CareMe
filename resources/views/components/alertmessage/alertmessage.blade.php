@props(['type'=>'danger'])

@if (session('message'))
        
  <div role="alert" aria-live="assertive"  class="toast show position-absolute text-center bg-success" data-bs-autohide="true" style=" margin: auto; top:0; left:0; right:0;  height:auto;  z-index: 1;" aria-atomic="true" data-autohide="true" data-delay="3000">

    
{{--      
      @if (session('type')=='delete')
      <div class="toast-body">
        <p class="text-{{ session('type') }}">{{ session('message') }}</p>
        <button type="button" class="btn btn-success" data-bs-dismiss="toast">OK</button>
      </div>
             

      @elseif (session('type')=='danger')
      <div class="toast-body">
        <p class="text-{{ session('type') }}">{{ session('message') }}</p>
        <button type="button" class="btn btn-success" data-bs-dismiss="toast">OK</button>
      </div>
      @else
      <div class="toast-body">
        <p class="text-{{ session('type') }}">{{ session('message') }}</p>
        <button type="button" class="btn btn-success" data-bs-dismiss="toast">OK</button>
      </div>
      @endif --}}
        
       
        <div class="alert alert-white alert-dismissible fade show col-lg-12" role="alert">
          <p class="text-white">{{ session('message') }}</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
 
      
      
      </div>


@endif
 