@extends('Layout.app')
@section('title')
Popular Destination
@endsection

@section('content')

<div id="mainDivpopularDestination" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<button id="addpopularDestinationAddNewBtnId"class="btn my-3 btn-sm btn-danger">Add New</button>

<table id="popularDestinationDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
	  <th class="th-sm">Image</th>
	  <th class="th-sm">Name</th>
      <th class="th-sm">Place</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="popularDestinationTable">




  </tbody>
</table>

</div>
</div>
</div>

<div id="loderDivpopularDestination" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
<img class= "oading-icon m-5"src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>

<div id="wrongDivpopularDestination" class="container  d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
<h3>Something Went Wrong !</h3>
<h5>Data not found</h5>



</div>
</div>
</div>

<div class="modal fade" id="deletepopularDestinationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          
          <h4 class='mt-5'>Do You Want To Delete ?</h4>

         <h6 id="popularDestinationDeleteId"class='mt-5 d-none '></h6>

          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button data-id=" "  id="popularDestinationDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- /////////////////////////////////////////////-->

<div class="modal fade" id="addpopularDestinationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          
         <h6 class="mb-4">Add New Popular Destination</h6>
     <div id="popularDestinationAddId" class="w-100"> 

     <input id="popularDestinationImageId" type="text" id="" class="form-control mb-3" placeholder="Popular Destination Image">
<input id="popularDestinationNameId" type="text" id="" class="form-control mb-3" placeholder="Popular Destination Name">
 <input id="popularDestinationPlaceId" type="text" id="" class="form-control mb-3" placeholder="Popular Destination Place">
    </div>
    



  
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
        <button data-id=" "  id="addpopularDestinationNewconfmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- /////////////////////////////////////////////-->


<div class="modal fade" id="editPopularDestinationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title">Update Popular Destination</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center">

         
      <h6 id="popularDestinationEditId"class='mt-5 d-none'></h6>


     <div id="popularDestinationFromId" class="w-100 d-none"> 
       
     <input id="popularDestinationImageDetailsId" type="text" id="" class="form-control mb-3" placeholder="Popular Destination Image">
    <input id="popularDestinationNameDetailsId" type="text" id="" class="form-control mb-3" placeholder="Popular Destination Name">
    <input id="popularDestinationPlaceDetailsId" type="text" id="" class="form-control mb-3" placeholder="Popular Destination Place">
    </div>
    <img id="popularDestinationEditLoderId" class= "oading-icon m-5"src="{{asset('images/loader.svg')}}">
    <h3 id="popularDestinationEditWrongId"class="w-100 d-none">Something Went Wrong !</h3>



  
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
        <button data-id=" "  id="popularDestinationEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">

getpopularDestinationData();


 
function getpopularDestinationData() {
    axios.get('/popularDestinationData')
        .then(function(response) {
  
            if (response.status == 200) {
                $('#mainDivpopularDestination').removeClass('d-none');
                $('#loderDivpopularDestination').addClass('d-none');
  
                $('#popularDestinationDataTable').DataTable().destroy();
                $('#popularDestinationTable').empty();
  
                var jsonData = response.data;
                $.each(jsonData,function(i, item) {
  
                    $('<tr>').html(
  
                        "<td>" + jsonData[i].popularDestination_img	 + "</td>" +
                        "<td>" + jsonData[i].popularDestination_name	 + "</td>" +
                        "<td>" + jsonData[i].popularDestination_place + "</td>" +
                   
                        "<td><a class='popularDestinationEDitBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-edit'></i></a></td>" +
  
                        "<td><a class='popularDestinationDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"
  
  
                    ).appendTo('#popularDestinationTable');
                });
                 
                 //course table delete icon table
                 $('.popularDestinationDeleteBtn').click(function() {
                  var id = $(this).data('id');
                  $('#popularDestinationDeleteId').html(id);
                  $('#deletepopularDestinationModal').modal('show');
              });
  
              
  
  ////////////////////////////////////////////////////////////////////////////////////
               
              //course edit icon click
              
              $('.popularDestinationEDitBtn').click(function() {
                var id = $(this).data('id');
                popularDestinationUpdatesDetails(id);
                $('#popularDestinationEditId').html(id);
                $('#editPopularDestinationModal').modal('show');
            })
              
              ///////////////////////////////////datata table///////////////////////////////////////////////////
             $('#popularDestinationDataTable').DataTable({"order":false});
             $('.dataTables_length').addClass('bs-select');
              
            
  
            } else {
                $('#wrongDivpopularDestination').removeClass('d-none');
                $('#loderDivpopularDestination').addClass('d-none');
  
            }
        })
  
  
  
        .catch(function(error) {
            $('#wrongDivpopularDestination').removeClass('d-none');
            $('#loderDivpopularDestination').addClass('d-none');
        });
    }
  
  
  
  //course delete yes button
  
  $('#popularDestinationDeleteConfirmBtn').click(function() {
    var id = $('#popularDestinationDeleteId').html();
    popularDestinationDelete(id);
  
  });
  
  // course Delete
  
  function popularDestinationDelete(deleteId) {
    $('#popularDestinationDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
    axios.post('/deletepopularDestinationData', {
            id: deleteId
        })
        .then(function(response) {
          $('#popularDestinationDeleteConfirmBtn').html('Yes');
  
           if(response.status==200){
            if (response.data == 1) {
              //alert('Success');
              $('#deletepopularDestinationModal').modal('hide');
  
              toastr.success('Delete Success');
              getpopularDestinationData();
          } else {
              //alert('Fail');
              $('#deletepopularDestinationModal').modal('hide');
              toastr.error('Delete Fail');
              getpopularDestinationData();
  
          }
  
           }else{
  
            $('#deletepopularDestinationModal').modal('hide');
          toastr.error('Something Went  Wrong !');
           }
        })
  
  
  
        .catch(function(error) {
          $('#deletepopularDestinationModal').modal('hide');
         toastr.error('Something Went  Wrong !');
        });
  }
  
  
  
  //course add new btn clk
  $('#addpopularDestinationAddNewBtnId').click(function() {
  
  $('#addpopularDestinationModal').modal('show');
  });
  
  //course add yes button
  
  $('#addpopularDestinationNewconfmBtn').click(function() {
  
  var popularDestinationImage = $('#popularDestinationImageId').val();
  var popularDestinationName = $('#popularDestinationNameId').val();
  var popularDestinationPlace= $('#popularDestinationPlaceId').val();

  
  popularDestinationAdd(popularDestinationImage,popularDestinationName,popularDestinationPlace);
  })
  
  
  //Course add function
  
  function popularDestinationAdd(popularDestinationImage,popularDestinationName,popularDestinationPlace) {
  $('#addpopularDestinationNewconfmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
  if(popularDestinationImage.length==0){
    toastr.error('Popular Destination Image is Empty !');
    $('#addpopularDestinationNewconfmBtn').html('Save');
  
   }else if(popularDestinationName.length==0){
    toastr.error('Popular Destination Name is Empty !');
  
    $('#addpopularDestinationNewconfmBtn').html('Save');
  
   }else if(popularDestinationPlace.length==0){
    toastr.error('Popular Destination Placeis Empty !');
  
    $('#addpopularDestinationNewconfmBtn').html('Save');
  

  
   }else {
    
  
   axios.post('/popularDestinationAdd', {
  
    popularDestination_img:popularDestinationImage,
    popularDestination_name	:popularDestinationName,
    popularDestination_place:popularDestinationPlace

     
  
  })
  .then(function(response) {
    $('#addpopularDestinationNewconfmBtn').html('Save');
  
    if(response.status==200){
      if (response.data == 1) {
        //alert('Success');
        $('#addpopularDestinationModal').modal('hide');
  
        toastr.success('Add Success');
        getpopularDestinationData();
    } else {
        //alert('Fail');
        $('#addpopularDestinationModal').modal('hide');
        toastr.error('Add Fail');
        getpopularDestinationData();
  
    }
    }else{
  
      $('#addpopularDestinationModal').modal('hide');
      toastr.error('Something Went  Wrong !');
  
  
    }
  
  })
  
  
  
  .catch(function(error) {
    $('#addpopularDestinationModal').modal('hide');
      toastr.error('Something Went  Wrong !');
  
  
  });
     
  }
  
  }
  
  // each course update details/////////////////////////////lllllllllllllllllllllllllllll/////////////////////////////
  
  function popularDestinationUpdatesDetails(updateId) {
  axios.post('/popularDestinationDetails', {
          id: updateId
      })
      .then(function(response) {
        if (response.status==200) {
          $('#popularDestinationFromId').removeClass('d-none');
          $('#popularDestinationEditLoderId').addClass('d-none');
  
  
          var jsonData = response.data;
        
          $('#popularDestinationImageDetailsId').val(jsonData[0].popularDestination_img);
          $('#popularDestinationNameDetailsId').val(jsonData[0].popularDestination_name);
          $('#popularDestinationPlaceDetailsId').val(jsonData[0].popularDestination_place);
  
        } else{
          $('#popularDestinationEditWrongId').removeClass('d-none');
          $('#popularDestinationEditLoderId').addClass('d-none');
  
        }
      })
  
  
  
      .catch(function(error) {
        $('#popularDestinationEditWrongId').removeClass('d-none');
        $('#popularDestinationEditLoderId').addClass('d-none');
  
      });
  }
  
  //////////////////////////////////////////////////////
  
          
  //course update yes button///////////////////////////////////
  
  $('#popularDestinationEditConfirmBtn').click(function() {
  var Id = $('#popularDestinationEditId').html();
  var popularDestinationImageDetailsId = $('#popularDestinationImageDetailsId').val();
  var popularDestinationNameDetailsId = $('#popularDestinationNameDetailsId').val();
  var popularDestinationPlaceDetailsId = $('#popularDestinationPlaceDetailsId').val();
  
  
  
  
  
  editPopularDestination(Id,popularDestinationImageDetailsId,popularDestinationNameDetailsId,popularDestinationPlaceDetailsId);
  })
  
  //course details
  
  
  function editPopularDestination(Id,popularDestinationImageDetailsId,popularDestinationNameDetailsId,popularDestinationPlaceDetailsId ) {
  $('#popularDestinationEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
  
   if(popularDestinationImageDetailsId.length==0){
    toastr.error('Popular Destination Image is Empty !');
    $('#popularDestinationEditConfirmBtn').html('Save');
  
   }else if(popularDestinationNameDetailsId.length==0){
    toastr.error('Popular Destination Name is Empty !');
    $('#popularDestinationEditConfirmBtn').html('Save');
  
   }else if(popularDestinationPlaceDetailsId.length==0){
    toastr.error('Popular Destination Place Fee is Empty !');
    $('#popularDestinationEditConfirmBtn').html('Save');
  
   }else {
  
    axios.post('/updatepopularDestinationData', {
      id:Id,
      popularDestination_img:popularDestinationImageDetailsId,
      popularDestination_name:popularDestinationNameDetailsId,
      popularDestination_place:popularDestinationPlaceDetailsId,


  
  })
  .then(function(response) {
    $('#popularDestinationEditConfirmBtn').html('Save');
  
    if(response.status==200){
      if (response.data == 1) {
       
        $('#editPopularDestinationModal').modal('hide');
  
        toastr.success('Update Success');
        getpopularDestinationData();
    } else {
        
        $('#editPopularDestinationModal').modal('hide');
        toastr.error('Update Fail');
        getpopularDestinationData();
  
    }
    }else{
  
      $('#editPopularDestinationModal').modal('hide');
      toastr.error('Something Went  Wrong !');
  
  
    }
  
  })
  
  
  
  .catch(function(error) {
    $('#editPopularDestinationModal').modal('hide');
      toastr.error('Something Went  Wrong !');
  
  
  });
     
  }
  
  }
  


</script>

@endsection