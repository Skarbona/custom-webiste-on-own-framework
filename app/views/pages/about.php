<?php require APPROOT . '/views/inc/header.php' ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container">

        <h1 class="display-4">
            <?php echo $data['title'] ?>
        </h1>
        <h2>
            <?php echo $data['small-title'] ?>
        </h2>
        <p class="lead">
            <?php echo $data['description'] ?>
        </p>
        <p>APP VERSION: <?php echo APPVERSION; ?></p>
    </div>

</div>


<?php require APPROOT . '/views/inc/footer.php' ?>

