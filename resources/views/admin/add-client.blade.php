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
                  <li class="breadcrumb-item active" aria-current="page">Add client</li>
               </ol>
            </nav>
         </div>
         <div class="ms-auto">
            <a href="{{url('client-list')}}" class="btn btn-danger"><i class='fa fa-eye'></i>View client</a>
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
			<div class="card border-top border-0 border-4 border-primary">
				<div class="card-body p-4">
					<div class="card-title d-flex align-items-center">
						<div><i class="bx bxs-box me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">Add client</h5>
						</div>
						<hr>
						<form class="row g-3" method="post" action="{{url('add-client')}}" enctype="multipart/form-data">
							@csrf
							<div class="col-md-6">
								<label for="" class="form-label">Name</label>
								<input type="text" name="name" class="form-control" id="" autofocus>
                        <span style="color:red;">
                        @error('name')
                        {{$message}}
                        @enderror
                        </span>	
							</div>
                     <div class="col-md-6">
								<label for="" class="form-label">Email</label>
								<input type="text" name="email" class="form-control" id="" >
                        <span style="color:red;">
                        @error('email')
                        {{$message}}
                        @enderror
                        </span>	
							</div>
                     <div class="col-md-6">
								<label for="" class="form-label">Address</label>
								<input type="text" name="address" class="form-control" id="" >
                         <span style="color:red;">
                         @error('address')
                         {{$message}}
                         @enderror
                         </span>	
							</div>
					<div class="col-md-6">
						<label for="" class="form-label">City</label>
						<input type="text" name="city" class="form-control" id="" >
                         <span style="color:red;">
                         @error('city')
                         {{$message}}
                         @enderror
                         </span>	
					</div>
                    <div class="col-md-12">
						<label for="" class="form-label">Notes</label>
                        <textarea name="notes" id="" class="form-control" cols="30" rows="10"></textarea>
                         <span style="color:red;">
                         @error('notes')
                         {{$message}}
                         @enderror
                         </span>	
					</div>
                  							
							<div class="col-12">
								<button type="submit" class="btn btn-primary px-5 rounded-0">Submit</button>
							</div>
						</form>
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
            <h5 class="modal-title" id="exampleModalLabel">Update Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="post" action="{{'njnj'}}">
               @csrf
               <div class="">
                  <div class=" p-4 rounded">
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">State Name</label>
                        <input type="text" class="form-control" name="state_name" id="inputProductTitle" placeholder="Enter product title">
                     </div>
                     <span style="color:red;" class="oko">
                     </span>
                     <input type="hidden" name="id" value="" id="upid">
                     <div class="">
                        <button type="submit" class="btn btn-primary">Update </button>
                     </div>
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
   $(document).ready( function () {
     $('.myTable').DataTable();
     $('.editme').click( function() {
        var del = $(this).closest('tr').find('#id').val();
     	$.ajax({
   		url : "{{'nnin'}}/" + del,
   		method : "GET",
   		data : "delete",
   		success : function(ok) {
   			// $('#inputProductDescription').html(ok.status.desc);
   			$('#inputProductTitle').val(ok.status.state_name);   			
   			$('#upid').val(ok.status.id);   			
   		}
   		});     	
     });
     
     });
</script>
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