<div class="row">
    <div class="col-md-9" style="margin-left: 10%;">
        <br>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="home">
                <form id="FormArticle" name="FormArticle" action="/article/regist" method="post">
                    <input type="hidden" name="actionType" value="<?php echo $data["actionType"]; ?>" />
                    <input type="hidden" name="article_id" value="<?php echo $data["article_id"]; ?>" />

                    <div class="form-group">
                            <label>BLOG</label>
                            <?php echo form_dropdown('blog_id', $blogs, $data["blog_id"], array('class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <label>TITLE</label>
                        <input type="text" name="title" value="<?php echo $data["title"]; ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>BODY</label>
                        <textarea name="body" class="form-control" rows="10" style="width: 100%;"><?php echo $data["body"]; ?></textarea>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="is_public">PUBLIC</label>&nbsp;&nbsp;&nbsp;
                        <input type="hidden" name="is_public" value="0" />
                        <input class="form-check-input" type="checkbox" name="is_public" id="is_public" value="1" <?php echo $data["is_public"] ? "checked" : ""; ?>>
                    </div><br><br><br><br>
                </form>
            </div>
        </div>

        <div class="btn-toolbar list-toolbar">
            <a href="/article" class="btn btn-danger"><i class="glyphicon glyphicon-circle-arrow-left"></i> Back</a>&nbsp;
            <button class="btn btn-primary" onclick="DoSubmit();"><i class="fa fa-save"></i> Save</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function() {
        $('#FormArticle').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ".ignore",
            rules: {
                blog_id: {
                    required: true
                },
                title: {
                    required: true
                },
                body: {
                    required: true
                },
            },
            messages: {
                blog_id: " ",
                title: " ",
                body: " ",
            },
            highlight: function(element) { // hightlight error inputs
                // $(element).closest('.help-inline').removeClass('ok'); // display OK icon
                $(element).addClass('is-invalid'); // set error class to the control group
            },
            unhighlight: function(element) { // revert the change dony by hightlight
                $(element).removeClass('is-invalid'); // set error class to the control group
            },
            submitHandler: function(form) {}
        });
    });

    function DoSubmit() {
        if (!$("#FormArticle").valid())
            return false;
        document.getElementById("FormArticle").submit();
    }
</script>