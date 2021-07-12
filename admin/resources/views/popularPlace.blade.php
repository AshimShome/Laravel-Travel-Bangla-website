@extends('Layout.app')
@section('title')
Popular Place
@endsection

@section('content')

<div id="mainDivPopularPlace" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<button id="addPopularPlaceNewBtnId"class="btn my-3 btn-sm btn-danger">Add New</button>

<table id="PopularPlaceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
	  <th class="th-sm">Place_name</th>
      <th class="th-sm">Place_Description</th>
      <th class="th-sm">Review</th>
      <th class="th-sm">Days</th>
      <th class="th-sm">Offer_price</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="PopularPlaceTable">


  </tbody>
</table>

</div>
</div>
</div>

<div id="loderDivPopularPlace" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
<img class= "oading-icon m-5"src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>

<div id="wrongDivPopularPlace" class="container  d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
<h3>Something Went Wrong !</h3>
<h5>Data not found</h5>



</div>
</div>
</div>

<div class="modal fade" id="deletePopularPlaceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          
          <h4 class='mt-5'>Do You Want To Delete ?</h4>

         <h6 id="PopularPlaceDeleteId"class='mt-5 d-none'></h6>

          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button data-id=" "  id="PopularPlaceDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- /////////////////////////////////////////////-->

<div class="modal fade" id="addPopularPlaceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Popular Place</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="image_linkId" type="text" id="" class="form-control mb-3" placeholder="Image Link">
          	 	<input id="place_nameId" type="text" id="" class="form-control mb-3" placeholder="Place Name">
    		 	<input id="place_descId" type="text" id="" class="form-control mb-3" placeholder="Place Description">
     			<input id="reviewId" type="text" id="" class="form-control mb-3" placeholder="Review">
       		</div>
       		<div class="col-md-6">
     			<input id="DaysId" type="text" id="" class="form-control mb-3" placeholder="Days">      
     			<input id="offer_priceId" type="text" id="" class="form-control mb-3" placeholder="Offer Price">
       		</div>
       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="PopularPlaceAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- /////////////////////////////////////////////-->

<div class="modal fade" id="updatePopularPlaceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update Popular Place</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">


      <h6 id="PopularPlaceEditId"class='mt-5 d-none'></h6>

       <div class="container d-none" id="PopularPlaceEditForm">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="PopularPlaceimage_linkUpdateId" type="text" id="" class="form-control mb-3" placeholder="image_link">
          	 	<input id="PopularPlaceplace_nameUpdateId" type="text" id="" class="form-control mb-3" placeholder="place_name">
    		 	<input id="PopularPlaceplace_descUpdateId" type="text" id="" class="form-control mb-3" placeholder="place_desc">
     			<input id="PopularPlacereviewUpdateId" type="text" id="" class="form-control mb-3" placeholder="review">
       		</div>
       		<div class="col-md-6">
     			<input id="PopularPlaceDaysUpdateId" type="text" id="" class="form-control mb-3" placeholder="Days">      
     			<input id="PopularPlaceoffer_priceUpdateId" type="text" id="" class="form-control mb-3" placeholder="offer_price">
       		</div>
       	</div>
       </div>
      </div>
      
    <img id="PopularPlaceEditLoderId" class= "oading-icon m-5"src="{{asset('images/loader.svg')}}">
    <h3 id="PopularPlaceEditWrongId"class="w-100 d-none">Something Went Wrong !</h3>
        
      
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="PopularPlaceEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- /////////////////////////////////////////////-->


@endsection

@section('script')
<script type="text/javascript">
getPopularPlaceData();

//for course table
function getPopularPlaceData() {
    axios.get('/getPopularPlacesData')
        .then(function(response) {
  
            if (response.status == 200) {
                $('#mainDivPopularPlace').removeClass('d-none');
                $('#loderDivPopularPlace').addClass('d-none');
  
                $('#PopularPlaceDataTable').DataTable().destroy();
                $('#PopularPlaceTable').empty();
  
                var jsonData = response.data;
                $.each(jsonData,function(i, item) {
  
                    $('<tr>').html(
  
                        "<td>" + jsonData[i].place_name + "</td>" +
                        "<td>" + jsonData[i].place_desc + "</td>" +
                        "<td>" + jsonData[i].review + "</td>" +
                        "<td>" + jsonData[i].Days + "</td>" +
                        "<td>" + jsonData[i].offer_price + "</td>" +


  
  
                        "<td><a class='PopularPlaceEDitBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-edit'></i></a></td>" +
  
                        "<td><a class='PopularPlaceDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"
  
  
                    ).appendTo('#PopularPlaceTable');
                });
                 
                 //course table delete icon table
                 $('.PopularPlaceDeleteBtn').click(function() {
                  var id = $(this).data('id');
                  $('#PopularPlaceDeleteId').html(id);
                  $('#deletePopularPlaceModal').modal('show');
              });
  
          
  
  ////////////////////////////////////////////////////////////////////////////////////
               
              //course edit icon click
              
              $('.PopularPlaceEDitBtn').click(function() {
                var id = $(this).data('id');
                PopularPlaceUpdatesDetails(id);
                $('#PopularPlaceEditId').html(id);
                $('#updatePopularPlaceModal').modal('show');
            })
              
              ///////////////////////////////////datata table///////////////////////////////////////////////////
             $('#PopularPlaceDataTable').DataTable({"order":false});
             $('.dataTables_length').addClass('bs-select');
              
            
  
            } else {
                $('#wrongDivPopularPlace').removeClass('d-none');
                $('#loderDivPopularPlace').addClass('d-none');
  
            }
        })
  
  
  
        .catch(function(error) {
            $('#wrongDivPopularPlace').removeClass('d-none');
            $('#loderDivPopularPlace').addClass('d-none');
        });
    }
  
  
  
  //course delete yes button
  
  $('#PopularPlaceDeleteConfirmBtn').click(function() {
    var id = $('#PopularPlaceDeleteId').html();
    PopularPlaceDelete(id);
  
  });
  
  // course Delete
  
  function PopularPlaceDelete(deleteId) {
    $('#PopularPlaceDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
    axios.post('/deletePopularPlacesData', {
            id: deleteId
        })
        .then(function(response) {
          $('#PopularPlaceDeleteConfirmBtn').html('Yes');
  
           if(response.status==200){
            if (response.data == 1) {
              //alert('Success');
              $('#deletePopularPlaceModal').modal('hide');
  
              toastr.success('Delete Success');
              getPopularPlaceData();
          } else {
              //alert('Fail');
              $('#deletePopularPlaceModal').modal('hide');
              toastr.error('Delete Fail');
              getPopularPlaceData();
  
          }
  
           }else{
  
            $('#deletePopularPlaceModal').modal('hide');
          toastr.error('Something Went  Wrong !');
           }
        })
  
  
  
        .catch(function(error) {
          $('#deleteCourseModal').modal('hide');
         toastr.error('Something Went  Wrong !');
        });
  }
  
  
  
  //course add new btn clk
  $('#addPopularPlaceNewBtnId').click(function() {
  
  $('#addPopularPlaceModal').modal('show');
  });
  
  //course add yes button
  
  $('#PopularPlaceAddConfirmBtn').click(function() {
  
  var image_link = $('#image_linkId').val();
  var place_name = $('#place_nameId').val();
  var place_desc= $('#place_descId').val();
  var review= $('#reviewId').val();
  var Days = $('#DaysId').val();
  var offer_price = $('#offer_priceId').val();
  
  
  
  PopularPlaceAdd(image_link,place_name,place_desc,review,Days,offer_price);
  })
  
  
  //Course add function
  
  function PopularPlaceAdd(image_link,place_name,place_desc,review,Days,offer_price) {
  $('#PopularPlaceAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
  if(image_link.length==0){
    toastr.error('image_link is Empty !');
    $('#PopularPlaceAddConfirmBtn').html('Save');
  
   }else if(place_name.length==0){
    toastr.error('place_name is Empty !');
  
    $('#PopularPlaceAddConfirmBtn').html('Save');
  
   }else if(place_desc.length==0){
    toastr.error('place_desc is Empty !');
  
    $('#PopularPlaceAddConfirmBtn').html('Save');
  
  }else if(review.length==0){
    toastr.error('review is Empty !');
  
    $('#PopularPlaceAddConfirmBtn').html('Save');
  
   }else if(Days.length==0){
    toastr.error('Days is Empty !');
    $('#PopularPlaceAddConfirmBtn').html('Save');
  
  
  }else if(offer_price.length==0){
    toastr.error('offer_price is Empty !');
  
    $('#PopularPlaceAddConfirmBtn').html('Save');
  
  
   }else {

  
   axios.post('/PopularPlacesAdd', {
  
    image_link:image_link,
    place_name:place_name,
    place_desc:place_desc,
    review:review,
    Days:Days,
    offer_price:offer_price
  
  })
  .then(function(response) {
    $('#PopularPlaceAddConfirmBtn').html('Save');
  
    if(response.status==200){
      if (response.data == 1) {
        //alert('Success');
        $('#addPopularPlaceModal').modal('hide');
  
        toastr.success('Add Success');
        getPopularPlaceData();
    } else {
        //alert('Fail');
        $('#addPopularPlaceModal').modal('hide');
        toastr.error('Add Fail');
        getPopularPlaceData();
  
    }
    }else{
  
      $('#addPopularPlaceModal').modal('hide');
      toastr.error('Something Went  Wrong !');
  
  
    }
  
  })
  
  
  
  .catch(function(error) {
    $('#addCourseModal').modal('hide');
      toastr.error('Something Went  Wrong !');
  
  
  });
     
  }
  
  }
  
  // each course update details/////////////////////////////lllllllllllllllllllllllllllll/////////////////////////////
  
  function PopularPlaceUpdatesDetails(updateId) {
  axios.post('/getPopularPlacesDetails', {
          id: updateId
      })
      .then(function(response) {
        if (response.status==200) {
          $('#PopularPlaceEditForm').removeClass('d-none');
          $('#PopularPlaceEditLoderId').addClass('d-none');
  

          var jsonData = response.data;
        
          $('#PopularPlaceimage_linkUpdateId').val(jsonData[0].image_link);
          $('#PopularPlaceplace_nameUpdateId').val(jsonData[0].place_name);
          $('#PopularPlaceplace_descUpdateId').val(jsonData[0].place_desc);
          $('#PopularPlacereviewUpdateId').val(jsonData[0].review);
          $('#PopularPlaceDaysUpdateId').val(jsonData[0].Days);
          $('#PopularPlaceoffer_priceUpdateId').val(jsonData[0].offer_price);
  
  
  
        } else{
          $('#PopularPlaceEditWrongId').removeClass('d-none');
          $('#PopularPlaceEditLoderId').addClass('d-none');
  
        }
      })
  
  
  
      .catch(function(error) {
        $('#PopularPlaceEditWrongId').removeClass('d-none');
        $('#PopularPlaceEditLoderId').addClass('d-none');
      });
  }
  
  //////////////////////////////////////////////////////
  
          
  //course update yes button///////////////////////////////////
  
  $('#PopularPlaceEditConfirmBtn').click(function() {
  var PopularPlaceEditId = $('#PopularPlaceEditId').html();
  var PopularPlaceimage_linkUpdate = $('#PopularPlaceimage_linkUpdateId').val();
  var PopularPlaceplace_nameUpdate = $('#PopularPlaceplace_nameUpdateId').val();
  var PopularPlaceplace_descUpdate = $('#PopularPlaceplace_descUpdateId').val();
  
  var PopularPlacereviewUpdate = $('#PopularPlacereviewUpdateId').val();
  var PopularPlaceDaysUpdate = $('#PopularPlaceDaysUpdateId').val();
  var PopularPlaceoffer_priceUpdate = $('#PopularPlaceoffer_priceUpdateId').val();
  
  
  
  
  PopularPlace(PopularPlaceEditId,PopularPlaceimage_linkUpdate,PopularPlaceplace_nameUpdate,PopularPlaceplace_descUpdate,
    PopularPlacereviewUpdate,PopularPlaceDaysUpdate,PopularPlaceoffer_priceUpdate );
  })
  
  //course details
  
  
  function PopularPlace(PopularPlaceEditId,PopularPlaceimage_linkUpdate,PopularPlaceplace_nameUpdate,PopularPlaceplace_descUpdate,
    PopularPlacereviewUpdate,PopularPlaceDaysUpdate,PopularPlaceoffer_priceUpdate ) {
  $('#PopularPlaceEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
  
   if(PopularPlaceimage_linkUpdate.length==0){
    toastr.error('image_link is Empty !');
    $('#PopularPlaceEditConfirmBtn').html('Save');
  
   }else if(PopularPlaceplace_nameUpdate.length==0){
    toastr.error('place_name is Empty !');
    $('#PopularPlaceEditConfirmBtn').html('Save');
  
   }else if(PopularPlaceplace_descUpdate.length==0){
    toastr.error('place_desc is Empty !');
    $('#PopularPlaceEditConfirmBtn').html('Save');
  
  }else if(PopularPlacereviewUpdate.length==0){
    toastr.error('review is Empty !');
    $('#PopularPlaceEditConfirmBtn').html('Save');
  
   }else if(PopularPlaceDaysUpdate.length==0){
    toastr.error('Days is Empty !');
    $('#PopularPlaceEditConfirmBtn').html('Save');
  
  }else if(PopularPlaceoffer_priceUpdate.length==0){
    toastr.error('offer_price is Empty !');
    $('#PopularPlaceEditConfirmBtn').html('Save');
  
   
   }else {
  
  
    axios.post('/updatePopularPlacesData', {
      id:PopularPlaceEditId,
      image_link:PopularPlaceimage_linkUpdate,
      place_name:PopularPlaceplace_nameUpdate,
      place_desc:PopularPlaceplace_descUpdate,
      review:PopularPlacereviewUpdate,
      Days:PopularPlaceDaysUpdate,
      offer_price:PopularPlaceoffer_priceUpdate,
  
  })
  .then(function(response) {
    $('#PopularPlaceEditConfirmBtn').html('Save');
  
    if(response.status==200){
      if (response.data == 1) {
       
        $('#updatePopularPlaceModal').modal('hide');
  
        toastr.success('Update Success');
        getPopularPlaceData();
    } else {
        
        $('#updatePopularPlaceModal').modal('hide');
        toastr.error('Update Fail');
        getPopularPlaceData();
  
    }
    }else{
  
      $('#updatePopularPlaceModal').modal('hide');
      toastr.error('Something Went  Wrong !');
  
  
    }
  
  })
  
  
  
  .catch(function(error) {
    $('#updatePopularPlaceModal').modal('hide');
      toastr.error('Something Went  Wrong !');
  
  
  });
     
  }
  
  }
  
  


</script>

@endsection