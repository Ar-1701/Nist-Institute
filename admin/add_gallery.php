<?php $active_page = 'add_gallery';
include_once "header.php"; ?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Add Gallery</h1>
      </div>
      <div class="col-md-12 d-flex justify-content-center">
        <!-- Form -->
        <form id="add_form1" action="gallery_upload.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Image</label>
            <input type="file" id="fileToUpload" class="form-control" name="fileToUpload">
          </div>
          <input type="submit" name="c-submit" id="c-submit" class="btn btn-primary" value="Save" />
        </form>
        <!-- Form -->
      </div>
    </div>
  </div>
</div>
<script src="../js/jquery.js"></script>
<script>
  $(document).ready(function() {
    $("#c-submit").on("click", function() {
      let about_img = $("#fileToUpload").val();
      if (about_img == "") {
        alert("Select Image");
        return false;
      }
    });
  });
</script>
<?php include_once "footer.php"; ?>