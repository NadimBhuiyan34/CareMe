<x-layouts.master>
    @slot('title')
     Inactive Account
    @endslot
    {{-- <h2 class="text-center text-success"> <i class="fa-solid fa-users-viewfinder"></i> <strong>Pe</strong></h2> --}}
    {{-- <x-alertmessage.alertmessage type="success"/> --}}
<div class="card mb-4 shadow">
   
<div class="card-header row" style="background-color: rgb(18, 20, 20)">
    {{-- <x-alertmessage.alertmessage type="success"/> --}}
        <a href="{{ route('doctors.index') }}"> <button class="btn btn-outline-info btn-sm text-black mr-2">Back</button></a>
        
        {{-- <x-alertmessage.alertmessage type="success"/> --}}

    </div>
  
   {{-- <x-backend.alertmessage.alertmessage type="success"/> --}}
    <div class="card-body">
         
        <table id="myTable">
            <thead>
                <tr>
                    <th>SL No</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Device Id</th>
                    <th>Picture</th>
                    <th>Created_at</th>
                    @if (auth()->user()->role_id==1)
                    <th>Action</th> 
                    @else
                    <th>Status</th> 
                    @endif
                    
                    {{-- <th>Action</th> --}}
                     
                </tr>
            </thead>
           
            <tbody>
                @foreach ($users as $user)
                    
               
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->roles->role}}</td>
                    <td>{{ $user->email }}</td>
                    <td>CM{{ $user->id }}</td>
                     
                    @if ($user->profiles)
                    <td><img src="{{asset('storage/profile/' . $user->profiles->image)}}" alt="User Image" style="height:50px;width:50px">
                    </td>
                    @else
                    <td><img src="{{ asset('storage/profile/profile.png') }}" alt="" style="height:50px;width:50px"></td>
                    @endif
                    
                    <td>{{ $user->created_at }}</td>
                     
                     
                     <td>
                        
                        <form class="" role="form" action="{{ route('users.update',['user'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch') 
                            <input type="hidden" name="status" value="active">
                             
                                
                            @if (auth()->user()->role_id==1)
                            <button type="submit" class="btn btn-success btn-sm">Active</button>
                            @else
                               <strong class="text-danger">Inactive</strong>
                            @endif
                        
                    </td>
                </form>  
                        

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
$('#myTable').DataTable({
  searching: true,
  paging: true,
  ordering: true
});
});
</script>
</x-layouts.master>