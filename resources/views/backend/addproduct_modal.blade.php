<div class="modal fade" id="addproductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/add/product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                @php
                                    $categories = DB::table('categories')->get();
                                @endphp
                                <label for="exampleInputEmail1">Category </label>
                                <select class="form-control form-control-sm" name="cat_id">
                                    <option selected="" disabled="" > == chose ==</option>
                                    @foreach ($categories as $item)

                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" name="name" required class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Name ">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Details</label>
                                <textarea name="details" required class="form-control" rows="3" placeholder="Details"></textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Price</label>
                                <input type="text" required name="price" id="" cols="30" rows="5" placeholder="Price..">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Image</label>
                                <input type="file" name="image">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Size</label>
                                <input type="text" required name="size" placeholder="size..">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Color</label>
                                <input type="text" required name="color" placeholder="color..">

                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-4">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" value="1" name="stock_out"
                                    id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">
                                    Stock in
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" value="0" name="hot_deal"
                                    id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">
                                    Hot deal
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" value="0" name="buy_one_get_one"
                                    id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">
                                    Buy One Get One
                                </label>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
