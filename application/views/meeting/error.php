<div class="row">
    <div class="col-md-6 mx-auto py-5 text-center">
        <?php if(isset($error)){ ?>
            <h4 class="text-danger">
                <?= $error ? $error : 'Nothing' ?>
            </h4>
        <?php } ?>
    </div>
</div>
