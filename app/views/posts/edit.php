<?php require APPROOT . '/views/inc/header.php' ?>


<a class="btn btn-light" href="<?php echo URLROOT;?>/posts/"><i class="fa fa-backward"></i> BACK</a>

<div class="card card-body bg-light mt-5">

    <h2>Edit Post</h2>
    <p>Edit a post with this form</p>
    <form action="<?php echo URLROOT ?>/posts/edit/<?php echo $data['id'] ?>" method="post">

        <div class="form-group">
            <label for="title">Title <sup>*</sup></label>
            <input type="text" name="title" class="form-control form-control-lg
                        <?php echo (!empty($data['title_err'])) ? 'is-invalid' : '' ?>"
                   value="<?php echo $data['title'] ?>">
            <span class="invalid-feedback"><?php echo $data['title_err'] ?> </span>
        </div>
        <div class="form-group">
            <label for="content">Content <sup>*</sup></label>
            <textarea name="body" class="form-control form-control-lg
                        <?php echo (!empty($data['body_err'])) ? 'is-invalid' : '' ?>"
            ><?php echo $data['body'] ?></textarea>
            <span class="invalid-feedback"><?php echo $data['body_err'] ?> </span>
        </div>

        <input type="submit" value="Update Post" class="btn btn-success">

    </form>
</div>




<?php require APPROOT . '/views/inc/footer.php' ?>
