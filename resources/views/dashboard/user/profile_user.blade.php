<x-layouts.master>
    @slot('title')
     Profile-Add
    @endslot
    
    <div class="card">
      <div class="card-header">
        <h3>User Profile Add</h3>
      </div>
      
      <div class="card-body bg-info text-white ">
        <form  role="form" action="{{ route('profiles.store') }}" method="post" enctype="multipart/form-data">
      
          @csrf
          @method('post')
          <input type="hidden" name="user_id" value="{{ $email }}">
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-6">
              <label for="profession">Profession</label>
              <input type="text" class="form-control" id="profession" placeholder="Your profession" name="profession">
            </div>
            <div class="form-group col-md-6 col-sm-6">
              <label for="birth">Date of Birth</label>
              <input type="date" class="form-control" id="birth" placeholder="" name="date">
            </div>
            <div class="form-group col-md-6 col-sm-6">
              <label for="gender">Gender</label>
              <select id="gender" class="form-control" name="gender">
                <option selected>Choose...</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
              </select>
            </div>
            <div class="form-group col-md-6 col-sm-6">
              <label for="married">Maritial Status</label>
              <select id="married" class="form-control" name="married">
                <option selected>Choose...</option>
                <option>Married</option>
                <option>Unmarried</option>
                
              </select>
            </div>
          </div>
         
           
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-6">
              <label for="city">District/City</label>
              <input type="text" class="form-control" id="city" name="city">
            </div>
            
            <div class="form-group col-md-6 col-sm-6">
              <label for="upazila">Upazila/Thana</label>
              <input type="text" class="form-control" id="upazila" name="upazila">
            </div>
            <div class="form-group col-md-6 col-sm-6">
              <label for="union">Union/Sector</label>
              <input type="text" class="form-control" id="union" name="union">
            </div>
            <div class="form-group col-md-2 col-sm-2">
              <label for="postcode">Post Code</label>
              <input type="text" class="form-control" id="postcode" name="postcode">
            </div>
            <div class="form-group col-md-4 col-sm-4">
              <label for="village">Village/Road No</label>
              <input type="text" class="form-control" id="village" name="village">
            </div>
            <div class="form-group col-md-6 col-sm-6">
              <label for="house">House No</label>
              <input type="text" class="form-control" id="house" name="house">
            </div>
            <div class="form-group col-md-3 col-sm-3">
              <label for="mobile">Mobile</label>
              <input type="text" class="form-control" id="mobile" name="mobile">
            </div>
            <div class="form-group col-md-3 col-sm-3">
              <label for="picture">Profile Picture</label>
              <input type="file" class="form-control" id="picture" name="picture">
            </div>
            <div class="form-group col-md-12">
              <label for="bio">Bio</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio"></textarea>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary " style="margin:auto">Submit</button>
        </form>
      </div>
    </div>
  
</x-layouts.master>