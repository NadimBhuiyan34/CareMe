<x-layouts.master>
    @slot('title')
     User List
    @endslot
    
    <h2 class="text-center text-success"> <i class="fa-solid fa-users-viewfinder"></i> <strong>Users List </strong></h2>
<div class="card mb-4 shadow">
    <x-alertmessage.alertmessage type="success"/>
<div class="card-header" style="background-color: rgb(18, 20, 20)">
        
         
        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm    text-white d-inline">Add New Patient</a>
       

        @if (auth()->user()->role_id==1 || auth()->user()->role_id==2)
        
        <a href="{{ route('users.pending') }}" class="btn btn-primary btn-sm   text-white   d-inline">Pending Account</a>

        <a href="{{ route('users.block') }}" class="btn btn-danger btn-sm    text-white   d-inline">Inactive Account</a>

        @endif




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
                    <th>Action</th>
                     
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
                            <input type="hidden" name="status" value="inactive">
                            <button class="btn btn-success btn-sm">Show</button>
                            @if (auth()->user()->role_id==1)
                            <button type="submit" class="btn btn-success btn-sm">Block</button>
                            @endif
                            
              
                        </form>
                            
                  
                    </td>
                
                       
                        

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