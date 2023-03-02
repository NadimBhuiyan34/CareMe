<x-layouts.master>
    @slot('title')
     Profile
    @endslot
 
    @foreach ($profiles as $profile)
      
  
  <div class="card container  border-left-info shadow">
     <div class="card-body row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            {{-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt=""> --}}
            <img src="{{asset('/storage/profile/'.$profile->image)}}" alt="your-image-description" style="max-width:40%; height:auto; 
@media screen and (max-width: 600px) { 
  max-width: 50%; 
} ">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h3>{{ auth()->user()->name }}</h3><br>
            
            <p>{{ $profile->bio }}</p>

            <div class="">
            <label for="">Email:{{ auth()->user()->email }}</label><br>
            <label for="" class="">Date of Birth: {{ $profile->datebirth }}</label><br>
            <label for="">Profession:</label><br>
            <label for="">Mobile:</label><br>
            <label for="">Age:</label><br>
            <label for="">Address:</label>
            </div>
             
        </div>
     </div>
  </div>
  @endforeach
</x-layouts.master>