<?php
require ('partials/db.php');
require('partials/header.php');
require ('partials/nav.php');
?>

<!-- Page Content -->
<div class="container-fluid py-2">
    <div class="py-2"></div>

    <div class="row">
        <div class="col-md-8">

            <?php
            $result = $conn->query('select * from tbContent');


            while ($row = $result->fetch_assoc()) {

            ?>

            <div class="card m-4">
                <div class="card-body">
                    <?php
                        $size = 7;
                        if (strlen($row['desc']) < 100) {
                            $size = 3;
                        }
                        else if (strlen($row['desc']) < 300) {
                            $size = 5;
                        }

                        echo "<h{$size}>{$row['desc']}</h{$size}";
                    ?>
                    <br>
                </div>
            </div>

            <?php } ?>

        </div>

        <div class="col-md-4">

            <div class="py-2"></div>

            <div class="card py-4 advert">
                <div class="card-body">
                    Tady se budou zobrazovat reklamy tvé sociální sítě
                </div>
            </div>
            <?php
                $result = $conn->query('select DATE_FORMAT(now(),\'%H:%i:%s\') as time');
                $row = $result->fetch_assoc();
            ?>
            <div class="text-right text-muted">Generováno v: <?php echo $row['time'] ?></div>
        </div>
    </div>
</div>

<?php

require('partials/footer.php');

