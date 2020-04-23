    <div class="btn-toolbar list-toolbar">
        <a class="btn btn-primary" href="/article/add"><i class="fa fa-plus"></i> Add</a>
        <div class="btn-group"></div>
    </div><br>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>BLOG_NAME</th>
                        <th>TITLE</th>
                        <th>BODY</th>
                        <th>PUBLIC</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($listdata)) { ?>
                        <?php foreach ($listdata as $row) { ?>
                            <tr>
                                <td><?php echo $row["article_id"]; ?></td>
                                <td><?php echo $row["blog_name"]; ?></td>
                                <td><?php echo $row["title"]; ?></td>
                                <td><?php echo $row["body"]; ?></td>
                                <td class="text-center">
                                    <?php if ($row["is_public"]) { ?>
                                        <i class="fa fa-check" style="font-size:24px" aria-hidden="true"></i>
                                    <?php } else { ?>
                                        <i class="fa fa-times" style="font-size:24px" aria-hidden="true"></i>
                                    <?php } ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="/article/edit/<?php echo $row["article_id"]; ?>"><i class="fa fa-pencil fa-lg"></i></a>&nbsp;&nbsp;&nbsp;
                                    <a href="#myModal" role="button" data-id="<?php echo $row["article_id"]; ?>" data-toggle="modal"><i class="fa fa-trash-o fa-lg"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
    <br><br><br><br><br>

<div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="btn-delete">Delete</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#myModal').on('show.bs.modal', function(e) {
            $('#btn-delete').click(function() {
                var id = $(e.relatedTarget).attr("data-id");
                window.location.href = "/article/delete/" + id;
            });

        });
    });
</script>