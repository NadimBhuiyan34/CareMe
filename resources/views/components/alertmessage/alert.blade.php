
{{-- <button class="btn btn-primary" onclick="showToast()">Show Toast</button> --}}
@props(['type'=>'danger'])
<!-- Create the toast container -->
@if (session('message'))
<div class="toast-container position-fixed bottom-0 end-0 p-3">

  <!-- Create the toast -->
  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="3000">

           
  {{-- <div role="alert" aria-live="assertive"  class="toast show position-absolute text-center bg-danger" data-bs-autohide="true" style=" margin: auto; top:0; left:0; right:0;  height:auto;  z-index: 1;" data-bs-delay="10000"> --}}

    <!-- Add a close button -->
    {{-- <button type="button" class="btn-close" data-dismiss="toast" aria-label="Close"></button> --}}

    <!-- Add the toast content -->
    <div class="toast-body">
        <p class="text-{{ session('type') }}">{{ session('message') }}</p>
        <button type="button" class="btn btn-success" data-bs-dismiss="toast">OK</button>
    </div>
  </div>
</div>
@endif
<!-- Add JavaScript to show the toast -->
<script>
function showToast() {
  // Get the toast element
  var toastEl = document.querySelector('.toast');
  
  // Create a new toast instance
  var toast = new bootstrap.Toast(toastEl);
  
  // Show the toast
  toast.show();
}
</script>