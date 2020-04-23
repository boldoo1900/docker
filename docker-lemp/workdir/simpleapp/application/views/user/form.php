<div class="row">
    <div class="col-md-7" style="margin-left: 10%;">
        <br>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="home">
                <form id="FormProfile" name="FormProfile" action="/user/editprofile" method="post">
                    <input type="hidden" name="actionType" value="edit" />
                    
                    <div class="form-group">
                        <label>EMAIL</label>
                        <input type="text" name="email" value="<?php echo $data["email"]; ?>" readonly class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>NICKNAME</label>
                        <input type="text" name="nickname" value="<?php echo $data["nickname"]; ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>PASSWORD</label>
                        <input type="password" name="password" value="" class="form-control" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>BIRTH DATE</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?php echo $data["birth_date"]; ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>HOBBY</label>
                        <?php echo form_dropdown('hobby_ids[]', $hobbies, $data["hobby_ids"], array('class'=>'form-control hobby-select2', 'multiple' => 'multiple')); ?>
                    </div>
                    <br><br><br><br>
                </form>
            </div>
        </div>

        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" onclick="DoSubmit();"><i class="fa fa-save"></i> Save</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function() {
        $('.hobby-select2').select2();

        $('#FormProfile').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ".ignore",
            rules: {
                nickname: {
                    required: true
                },
                birth_date: {
                    required: true
                }
            },
            messages: {
                nickname: " ",
                birth_date: " "
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
        if (!$("#FormProfile").valid())
            return false;
        document.getElementById("FormProfile").submit();
    }
</script>