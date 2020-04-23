<h2>Online published articles </h2>

<?php foreach($articles as $row){ ?>
    <div class="card">
    <div class="card-body">
        <h5 class="card-title"><?php echo $row["title"]; ?></h5>
        <p class="card-text"><?php echo $row["body"]; ?></p>

        <a class="card-link" style="float:right;"><?php echo $row["created_at"]; ?></a>
        <a class="card-link"><a href="/article/detail/<?php echo $row["article_id"]; ?>">Read More...</a></a>
    </div>
    </div><br>    
<?php } ?>
