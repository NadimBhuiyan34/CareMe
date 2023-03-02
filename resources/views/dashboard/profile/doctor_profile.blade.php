<x-layouts.master>
    @slot('title')
     Profile-Add
    @endslot
    
    <div class="card">
      <div class="card-header">
        <h3>Doctors Profile Add</h3>
      </div>
      <div class="card-body bg-info text-white ">
        <form  role="form" action="{{ route('doctors.profile') }}" method="post" enctype="multipart/form-data">
      
          @csrf
          @method('post')
          {{-- <input type="hidden" name="user_id" value="{{ $email }}"> --}}
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-6">
              <label for="hqualification">High Qualification</label>
              <input type="text" class="form-control" id="hqualification" placeholder="Your profession" name="hqualification">
            </div>
            <div class="form-group col-md-6 col-sm-6">
              <label for="specility">Specility</label>
              <input type="text" class="form-control" id="specility" placeholder="" name="specility">
            </div>
            <div class="form-group col-md-6 col-sm-6">
              <label for="collage">Medical Collage</label>
              <input type="text" class="form-control" id="collage" placeholder="" name="collage">
            </div>
            <div class="form-group col-md-6 col-sm-6">
              <label for="mobile">Mobile</label>
              <input type="text" class="form-control" id="mobile" name="mobile">
            </div>
            <div class="form-group col-md-12 col-sm-12">
              <label for="picture">Profile Picture</label>
              <input type="file" class="form-control" id="picture" name="picture">
            </div>
            <div class="form-group col-md-12 col-sm-12">
              <label for="about">About</label>
              <textarea class="form-control" id="about" rows="3" name="about"></textarea>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary " style="margin:auto">Submit</button>
        </form>
      </div>
    </div>
  
</x-layouts.master>