@extends('Layout.app')
@section('content')

<div class="container d-none" id="maindiv">
  <div class="row">
    <div class="col-md-12 p-5">
      <button id="Addbtn" class="btn btn-success">Add services</button>
      <table id="serviceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="th-sm">Image</th>
            <th class="th-sm">Name</th>
            <th class="th-sm">Description</th>
            <th class="th-sm">Edit</th>
            <th class="th-sm">Delete</th>
          </tr>
        </thead>
        <tbody id="service_table">




        </tbody>
      </table>

    </div>
  </div>
</div>

<div class="container mt-5" id="loaderdiv">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="spinner-grow text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>
</div>
<div class="container d-none" id="wrongdiv">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>Something went wrong!</h3>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog" role="document">


    <div class="modal-content">
      <div class="modal-body text-center">
        <h5>Do you want to delete?</h5>
        <h5 id="serviceDeleteId" class="mt-4 d-none">   </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
        <button id="serviceDeleteConfirm" data-id="" type="button" class="btn btn-primary btn-sm">Yes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-body text-center d-none">
        <h5>Do you want to update the information?</h5>
        <h5 id="serviceEditId" class="mt-4 d-none">   </h5>
        <input type="text" id="serviceNameId" class="form-control mb-4" placeholder="Service name">
        <input type="text" id="serviceDescId" class="form-control mb-4" placeholder="Service description">
        <input type="text" id="serviceImgId" class="form-control mb-4" placeholder="service image link">

      </div>
      <div class="text-center">
        <div id="Editloader" class="spinner-grow text-primary text-center" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <div id="Editwrong" class="col-md-12 text-center d-none">
          <h3>Something went wrong!</h3>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
        <button id="serviceEditConfirm" data-id="" type="button" class="btn btn-primary btn-sm">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg " role="document">


    <div class="modal-content p-5">
      <div class="modal-body text-center">
        <h5>Add new services</h5>
        <input type="text" id="serviceNameAddId" class="form-control mb-4" placeholder="Service name">
        <input type="text" id="serviceDescAddId" class="form-control mb-4" placeholder="Service description">
        <input type="text" id="serviceImgAddId" class="form-control mb-4" placeholder="service image link">

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button id="serviceAddConfirm" data-id="" type="button" class="btn btn-sm btn-danger ">Add</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')

<script type="text/javascript">
  getServiceData();
</script>

@endsection