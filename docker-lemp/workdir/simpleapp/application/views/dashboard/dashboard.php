<?php foreach($blogs as $key => $row){ ?>
  <?php if($key == 0 || ($key)%3 == 0){ ?>
    <div class="row">      
  <?php } ?>

  <div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
      <a href="/article/online"><img class="card-img-top" src="<?php echo BASEURL."/assets/uploads/blogs/". $row["header_image"] ?>" alt="" height="200" width="250"></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="/article/online/<?php echo $row["blog_id"]; ?>"><?php echo $row["blog_name"]; ?></a>
        </h4>
        <!-- <h5>$24.99</h5> -->
        <p class="card-text"><?php echo $row["sub_title"]; ?></p>
      </div>
      <div class="card-footer">
        <!-- <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small> -->
      </div>
    </div>
  </div>

  <?php if(count($blogs) == ($key+1) || ($key+1)%3 == 0){ ?>
    </div>     
  <?php } ?>
<?php } ?>
<br><br><br><br>
