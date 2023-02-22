
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <form id="editForm" method="POST">
          <div class="form-group">
            <input type="hidden" class="form-control" id="edit_product_id" name="edit_product_id" placeholder="Enter Product Name">
          </div>
          <div class="form-group">
            <label for="exampleInputtext1">Product Name</label>
            <input type="text" class="form-control" id="edit_product_name" name="edit_product_name" placeholder="Enter Product Name">
          </div>
          <div class="form-group">
            <label for="exampleInputtext1">Product Description</label>
            <input type="text" class="form-control" id="edit_product_desc" name="edit_product_desc" placeholder="Enter Product Description">
          </div>
          <div class="form-group">
            <label for="exampleInputtext1">Product Image</label>
            <input type="text" class="form-control" id="edit_product_img" name="edit_product_img" placeholder="Enter Product Image">
          </div>
          <div class="form-group">
            <label for="exampleInputtext1">Product Price</label>
            <input type="number" class="form-control" id="edit_product_price " name="edit_product_price" placeholder="Enter Product Price">
          </div>
          <input type="submit" value="save" id="edit-button" name="save">
        </form>
      </div>
    </div>
  </div>
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    jsarrays = JSON.parse(sessionStorage.getItem("jsArray"));
    obj = JSON.parse(sessionStorage.getItem("obj"));
    console.log(jsarrays);
      $("#edit_product_name").val(jsarrays[0].product_name);
      $("#edit_product_desc").val(jsarrays[0].current_price);
      $("#edit_product_img").val(jsarrays[0].product_id);
</script>
