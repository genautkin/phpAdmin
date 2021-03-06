<!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Posts</h1>
                        <a href="?addPost" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Add post</a>
                    </div>
                    <div class="row"></div>

<?php  
        $link = sql_connect();
        $sql = "SELECT * FROM Posts ORDER BY 'Time' ASC";
        $result = mysqli_query($link, $sql);
 
?>
 <div class="card-columns">
    <?php if($result && mysqli_num_rows($result) > 0): ?>
      <ul>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="card">
                <?php $url = "https://picsum.photos/500/30".rand(0,9); ?>
                <img class="card-img-top img-fluid" style="max-height: 100px"  src='<?= $url ?>' alt="post img">
                <div class="card-body">
                <h5 class="card-title"><?= $row['Title']?></h5>
                <p style="white-space: pre-line;" class="card-text"><?= $row['Article']?></p>
                <p class="card-text m-0"><small class="text-muted">Last updated <?= date('d/m/y H:i', $row['Time'])?></small></p>
                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $row['User_id']) : ?>
                        <a href="./?editPost=<?=$row['PostId'] ?>" class="m-0" style="text-align:center; cursor: pointer; display: block"><i class="fas fa-edit"></i></a>
                 <?php endif ; ?>        
                </div>
            </div>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>

</div>