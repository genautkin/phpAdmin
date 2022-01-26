
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add post</h1>
                        <a href="./" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-home fa-sm text-white-50"></i> Dashboard</a>
                    </div>
<form action="" method="POST">
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Article</label>
    <textarea class="form-control" name="article" id="exampleFormControlTextarea1" rows="5"></textarea>
  </div>
  <div class="invalid-feedback" style="display:<?php echo (isset($data['errorMessage'])) ? 'block':'none';?>"><?php echo $data['errorMessage'] ?></div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a href="./" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                                class="fas fa-sm text-white-50"></i> Cancel</a>
                        <button type="submit" name="add_post" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-save fa-sm text-white-50"></i> Save</button>
                    </div>
</form>