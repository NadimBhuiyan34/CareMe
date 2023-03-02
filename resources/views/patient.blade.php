{{-- @extends('layouts.master') --}}
<x-layouts.master>
{{-- @dd($sensors) --}}
@slot('title')
CareMe-Dashboard
@endslot
 
    

{{-- @section('content') --}}
{{-- @if (auth()->user()->role_id==4) --}}
    

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4 ">
   
        <a href="{{ route('treatments.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i>Take Treatement</a>
    </div>

{{-- new --}}
 

 
    <!-- Content Row -->
    <div class="row container">
        
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 col-sm-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Room Temperature</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="room"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 col-sm-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Humidity</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="humidity"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 col-sm-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Body Temperature
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="body"></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-6 col-md-6 col-sm-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pulse Rate</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="heart"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    Data
                     
                </div>
                <!-- Card Body -->
                <div class="card-body table-responsive h-50" style="height:100px;overflow:auto">
                     
                  
                    <table class="table table-bordered"  id="myTable1">
                        <thead>
                            <tr>
                                <th scope="col-md-1">#</th>
                                <th scope="col-md-1">Room Temperature</th>
                                <th scope="col">Humidity</th>
                                <th scope="col">Body Temperature</th>
                                <th scope="col">Pulse Rate</th>
                                <th scope="col">Date & Time</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark " style="height:200px">
                            
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>

        
    </div>

    




</div>
  
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function(){
     
    // setTimeout(fetchdata, interval);
    // setInterval(fetchdata, 5000);
    fetchdata();
    function fetchdata()
    {
        $.ajax({
          type: "GET",
          url: "/sensor",
          dataType: "json",
          success: function (response){
            // console.log(response.data);
            $.each(response.data, function(key,item){
               
                $('tbody').append(
                    ' <tr>\
                                <td>'+item.id+'</td>\
                                <td>'+item.room_temperature+'</td>\
                                <td>'+item.humidity+'</td>\
                                <td>'+item.body_temperature+'</td>\
                                <td>'+item.heart_rate+'</td>\
                                <td>'+item.created_at+'</td>\
                            </tr>'
                );
                var room=document.getElementById('room');
                var humidity=document.getElementById('humidity');
                var body=document.getElementById('body');
                var heart=document.getElementById('heart');
                room.innerText=item.room_temperature;
                humidity.innerText=item.humidity;
                body.innerText=item.body_temperature;
                heart.innerText=item.heart_rate;
            });
          }
        });
    }
  })
  $(document).ready(function() {
  $('#myTable').DataTable({
    searching: true,
    paging: true,
    ordering: true
  });
});

</script>


</x-layouts.master>