<?php include "static/header.php"?>

<?php
    $application_id = 0;
    if(isset($_POST["comments"]))
    {
        $application_id = (int)$_POST["comments"];
    }
    else
    {
        header("Location: user.php");
        exit;
    }

    // $query_to_get_comments = "SELECT getComments($application_id)";

    // $result = pg_query($db_connection, $query_to_get_comments);
    // $rows = pg_fetch_row($result);
    // echo gettype($rows);

    $query_for_comments = "SELECT commentid,commentorid,commentorposition,appid,comment,timing from comments where appid = '$application_id' ";
	$results = pg_query($db_connection,$query_for_comments);
	while($comment = pg_fetch_row($results))
    {
        $comment_id = $comment[0];
        $commentor_id = strtoupper($comment[1]);
        $commentor_position = $comment[2];
        $comment = $comment[4];
        $timing  = $comment[5];
?>

<div class="card w-75 mx-auto">
  <div class="card-header">
    <?php echo $commentor_position ?> wrote
  </div>
  <div class="card-body">
    <h6 class="card-title">Name of commentor: <?php echo $commentor_id ?></h6>
    <p class="card-text"><?php echo "$comment" ?></p>
  </div>
  <div class="card-footer text-muted">
    <?php echo $timing ?>
  </div>
</div>




<?php
    }
?>


<?php include "static/footer.php"?>

