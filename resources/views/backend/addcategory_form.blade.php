<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{url('/categories/add')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" name="cat_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category ">

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>

      </div>
    </div>
  </div>
