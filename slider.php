<!-- Carousel -->
<div id="demo" class="carousel slide slider car_s" data-bs-ride="carousel">
    <!-- Indicators/dots -->
    <?php include_once "config.php";
    $sql = "SELECT * FROM carousel ORDER BY carousel_id DESC";
    $result = mysqli_query($conn, $sql); ?>
    <!-- The slideshow/carousel -->
    <div class="carousel-indicators">
        <?php
        $i = 0;
        foreach ($result as $row) {
            $active = '';
            if ($i == 0) {
                $active = 'active';
            }  ?>
            <a type="button" data-bs-target="#demo" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></a>
        <?php $i++;
        } ?>
    </div>
    <!-- The slideshow/carousel Image -->
    <div class="carousel-inner">
        <?php
        $i = 0;
        foreach ($result as $row) {
            $active = '';
            if ($i == 0) {
                $active = 'active';
            }  ?>
            <div class="carousel-item <?php echo $active; ?>">
                <img src="admin/upload/carousel-image/<?php echo $row['carousel_name']; ?>" alt="carousel image" class="img-fluid d-block slider-img">
            </div>
        <?php $i++;
        } ?>
    </div>
    <!-- Left and right controls/icons -->
    <a class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>