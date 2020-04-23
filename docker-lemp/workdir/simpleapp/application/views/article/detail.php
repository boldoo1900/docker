<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?php echo $article["title"]; ?></h5>
        <p class="card-text"><?php echo $article["body"]; ?></p>

        <br><br><br><br>
        <a class="card-link">Blog name: <?php echo $article["blog_name"]; ?></a>
        <a class="card-link">Published by: <?php echo $article["nickname"]; ?></a>
        <a class="card-link">Date: <?php echo $article["created_at"]; ?></a>
    </div>
</div>
<br><br>

<div class="card">
  <h5 class="card-header">Comments</h5>
  <div class="card-body" id="comment-card">
    
    <?php foreach($comments as $row){ ?>
        <div>
            <h5 class="card-title"><?php echo $row["nickname"]; ?></h5>
            <p class="card-text"><?php echo $row["comment"] ?></p>
            <a class="card-link" style="font-size: 10px;"><?php echo date("Y-m-d h:s", strtotime($row["created_at"])); ?></a>
        </div>
        <hr>
    <?php } ?>

  </div>
</div>

<div class="card">
  <div class="card-body">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="title" id="title" value="<?php echo $_SESSION["userInfo"]["nickname"]; ?>" class="form-control" readonly autocomplete="off">
        </div>
        <div class="form-group">
            <label>BODY</label>
            <textarea name="body" id="body" class="form-control" rows="7" style="width: 100%;"></textarea>
        </div>

        <a href="javascript:void(0);" class="btn btn-primary" onclick="DoComment();" style="float: right;">&nbsp;Submit&nbsp;</a>
  </div>
</div>


<script type="text/javascript">
    function DoComment() {
        if($("#body").val().trim().length == 0) return;

        $.ajax({
            type: "POST",
            url: "/comment/addAjax",
            data: { body: $("#body").val(), article_id: <?php echo $article["article_id"]; ?> },
            dataType: "json",
            success: function(response){

                if(response.status === "SUCCESS"){
                    $("#comment-card").append('<div>\n\
                                                    <h5 class="card-title">'+ $("#title").val() +'</h5>\n\
                                                    <p class="card-text">'+ $("#body").val() +'</p>\n\
                                                    <a class="card-link" style="font-size: 10px;">'+ response.created_at +'</a>\n\
                                              </div>');

                    $("#body").val("");
                } else {
                    alert(response);
                }
            }
        });


    }
</script>