<?php /** @var Exception $exception */?>
    <div class="not-found">
        <h1 class="display-1"><?php echo $exception->getCode(); ?></h1>
        <p class="lead"><?php echo $exception->header()?></p>
        <p class="mb-5"><?php echo $exception->getMessage(); ?></p>
        <a href="/" class="btn btn-primary">Go Back to Home</a>
    </div>
