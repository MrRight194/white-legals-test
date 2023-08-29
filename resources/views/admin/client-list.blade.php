@extends('admin.layout.master-page')
@section("content")
<!--end header -->
<!--start page wrapper -->
<div class="page-wrapper">
   <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         <div class="breadcrumb-title pe-3">Client</div>
         <div class="ps-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-0 p-0">
                  <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Client list</li>
               </ol>
            </nav>
         </div>
         <div class="ms-auto">
            <a href="{{url('add-client')}}" class="btn btn-primary">Add client</a>
            <!-- <div class="btn-group">
               <button type="button" class="btn btn-primary">Settings</button>
               <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
               </button>
               <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
               	<a class="dropdown-item" href="javascript:;">Another action</a>
               	<a class="dropdown-item" href="javascript:;">Something else here</a>
               	<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
               </div>
               </div> -->
         </div>
      </div>
      <!--end breadcrumb-->
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Success!</strong> {{ session('success')}}.
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Error!</strong> {{ session('error')}}.
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <div class="row">
         <div class="col-12 col-md-12">
            <div class="card px-2 py-2">
               <div class="table-responsive">
                  <table class="table table-bordered table-striped datatable myTable" id="">
                     <thead class="table-light">
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>City</th>
                           <th>Address</th>
                           <th>Notes</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($clients as $key => $row)
                        <tr>
                           <td>
                              <div class="d-flex align-items-center">
                                 <div class="ms-2">
                                    <h6 class="mb-0 font-14">{{++$key}}</h6>
                                 </div>
                                 <input type="hidden" name="ok" id="id" value="{{$row->id}}">
                              </div>
                           </td>
                           <td>{{$row->name}}</td>
                           <td>{{$row->email}}</td>
                           <td>{{$row->city}}</td>
                           <td>{{$row->address}}</td>        
                           <td>{{$row->notes}}</td>
                           <td>
                              <div class="d-flex ">
                                 <!-- <button type="button" class="btn btn-warning editme" data-bs-toggle="modal" data-id="{{$row->id}}" data-username="{{$row->email}}" data-password="{{$row->user_key}}" data-bs-target="#exampleModal"><i class='bx bxs-user me-0'></i>User</button> -->
                                 <a class="mx-1 btn btn-primary" href="{{url('client-edit')}}/{{$row->id}}"><i class='fa fa-edit'></i>Edit</a>
                                 <a class="mx-1 btn btn-danger" href="{{url('client-delete')}}/{{$row->id}}" onclick="return confirm('Are you sure! you want to delete this client?');"><i class='bx bxs-trash'></i>Delete</a>
                                 <!-- <a href="{{url('land/delete')}}/{{$row->id}}">ok</a> -->
                              </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--end page wrapper -->
<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> User credential</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="post" action="{{url('generate')}}">
               @csrf
               <div class="">
                  <div class=" p-4 rounded">
                     <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="">
                     </div>
                     <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" value="" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
                     </div>
                     </span>
                     <input type="hidden" name="id" value="" id="upid">
                     <!-- <div class="">
                        <button type="submit" class="btn btn-primary">Generate </button>
                     </div> -->
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection
@section('script')
<script>
         $(document).ready(function () {
         	$("#show_hide_password a").on('click', function (event) {
         		event.preventDefault();
         		if ($('#show_hide_password input').attr("type") == "text") {
         			$('#show_hide_password input').attr('type', 'password');
         			$('#show_hide_password i').addClass("bx-hide");
         			$('#show_hide_password i').removeClass("bx-show");
         		} else if ($('#show_hide_password input').attr("type") == "password") {
         			$('#show_hide_password input').attr('type', 'text');
         			$('#show_hide_password i').removeClass("bx-hide");
         			$('#show_hide_password i').addClass("bx-show");
         		}
         	});
         });
      </script>
<script>
   $(document).ready( function () {
     $('.myTable').DataTable({
        "aLengthMenu": [1000]
    });
     $('.editme').click( function() {
      //   var del = $(this).closest('tr').find('#id').val();
      $('#username').val('');
      $('#inputChoosePassword').val('');
      $('#upid').val('');
      var id = $(this).attr('data-id');  	
      var username = $(this).attr('data-username');  	
      var password = $(this).attr('data-password');  	
      $('#username').val(username);
      $('#inputChoosePassword').val(password);
      $('#upid').val(id);
     });
     
     });
</script>
<script type="text/javascript">
   $(document).on("click",".deleteme",function() {
    var del = $(this).closest('tr').find('#id').val();
    swal({
   title: "Are you sure?",
   text: "Do you want delete this!",
   icon: "warning",
   buttons: true,
   dangerMode: true,
   })
   .then((willDelete) => {
   if (willDelete) { 
    $.ajax({
    url : "{{url('kjnjn')}}/" + del,
    method : "GET",
   
    success : function(ok) {
   
   swal(ok.status, {
   icon: "success",
   })
   .then((willDelete) => {
    location.reload();
   });
    }
   
   });
   }
   });
   });
</script>
<script type="text/javascript">
   $(document).on("click",".restore",function() {
    var del = $(this).closest('tr').find('#id').val();
    swal({
   title: "Are you sure?",
   text: "Do you want recover!",
   icon: "success",
   buttons: true,
   dangerMode: false,
   })
   .then((willDelete) => {
   if (willDelete) { 
    $.ajax({
    url : "{{url('jnjnj')}}/" + del,
    method : "GET",
   
    success : function(ok) {
   
   swal(ok.status, {
   icon: "success",
   })
   .then((willDelete) => {
    location.reload();
   });
    }
   
   });
   }
   });
   });
</script>
@endsection