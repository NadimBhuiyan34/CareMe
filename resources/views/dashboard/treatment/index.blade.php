<x-layouts.master>
    @slot('title')
     Take-Treatment
    @endslot

 <div class="container">
    <div>
    
        <button class="btn btn-info d-sm-inline-block" id="hospital" style="display:block">From Hospital</button>
        <button class="btn btn-primary d-sm-inline-block" id="doctor" style="display:block">From Doctor</button>
    </div>
<form action="{{ route('treatments.store') }}">
  @csrf
  @method('post')
 <div class="card mt-3" id="hospitalDiv" style="display:none">
  <div class="card-header">Share your problem</div>
  <div class="card-body">
    <textarea name="problem" id="" cols="30" rows="10" class="w-100"></textarea>
    <input type="hidden" name="hospital" value="request">
    <button class="btn btn-success btn-sm" type="submit">Submit</button>
  </div>
 </div>

</form>


<div class="card mt-3" id="myDiv" style="display:none">
  <div class="card-header text-center bg-success text-white">
    <h3>Choose your doctor</h3>
  </div>
    <div class="card-body">
         
        <table id="myTable1" class="" >
            <thead>
                <tr>
                    <th></th>
                   
                   
                </tr>
                
            </thead>
            <tbody>

             @foreach ($doctors as $doctor)
             <tr>

           <td class="text-center">
            <div class="card shadow d-flex border-left-primary">
             <div class="">
              <img src="{{asset('storage/doctor_profile/' . $doctor->doctor_profiles->image)}}" class="img-fluid mt-3" alt="Responsive image" style="height:150px;width:150px">
             </div>
             <div class="mb-2">
              {{ $doctor->name }}
              <br>
              {{ $doctor->doctor_profiles->hqualification }}
              <br>
              {{ $doctor->doctor_profiles->collage }}
              <br>
              {{-- <button class="btn btn-info btn-sm">More</button>
              <button class="btn btn-info btn-sm">Appointment</button> --}}
              <a class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" href="#offcanvasExample{{ $doctor->id }}" role="button" aria-controls="offcanvasExample">
                More
              </a>
              <a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#collapseExample{{ $doctor->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                Share Problem
              </a>
              {{-- More --}}
              <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample{{ $doctor->id }}" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header text-center">
                  <h5 class="offcanvas-title text-center" id="offcanvasExampleLabel">{{ $doctor->name }}</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <div>
                    <img src="{{asset('storage/doctor_profile/' . $doctor->doctor_profiles->image)}}" class="img-fluid mt-3" alt="Responsive image" style="height:150px;width:150px">
                    <br>
                    {{ $doctor->name }}
                    <br>
                    {{ $doctor->doctor_profiles->hqualification }}
                    <br>
                    {{ $doctor->doctor_profiles->collage }}
                    <br>
                    {{ $doctor->doctor_profiles->specility }}
                    <br>
                    {{ $doctor->doctor_profiles->about }}
                  </div>
                  
                </div>
              </div>
           {{--appointment  --}}
           <form action="{{ route('treatments.store') }}">
            @csrf
            @method('post')
           <div class="collapse" id="collapseExample{{ $doctor->id }}">
            <div class="card card-body">
             <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                <textarea name="problem" id="" cols="30" rows="5">
 
                               </textarea>
                             
                              <button class="btn btn-success btn-sm mt-2" type="submit">Submit</button>
          

            </div>
          </div>
        </form>

             </div>
             
            </div>
           </td>
           
                 
            </tr>
              @endforeach


            {{-- <div class="row">


                @foreach ($doctors as $doctor)
                  <div class="card col-md-4 col-sm-6">
                    <label for="">Name:{{ $doctor->name }}</label>
                  </div>  

                @endforeach
            </div> --}}
            </tbody>
        </table>
    </div>
</div>

 </div>


</x-layouts.master> 
<script>
    $(document).ready(function() {
$('#myTable1').DataTable({
  searching: true,
  paging: true,
  ordering: true
});
});
</script>
<script>
  document.getElementById("doctor").addEventListener("click", doctor);
  document.getElementById("hospital").addEventListener("click", hospital);
  
  function doctor() {
      var div = document.getElementById("myDiv");
      var hospitalBtn = document.getElementById("hospital");
      if (div.style.display === "none") {
          div.style.display = "block";
          hospitalBtn.disabled=true;
      } 
      else
      {
        div.style.display = "none";
        hospitalBtn.disabled=false;
      }
    }
  function hospital() {
      var div = document.getElementById("hospitalDiv");
      var doctorBtn = document.getElementById("doctor");
      if (div.style.display === "none") {
          div.style.display = "block";
          doctorBtn.disabled = true;
      } 
      else
      {
        div.style.display = "none";
        doctorBtn.disabled = false;
      }
    }
  
  </script>
  