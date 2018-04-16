<?php
require ('partials/db.php');
require('partials/auth.php');
require('partials/header.php');
require ('partials/nav.php');

?>

<!-- JuicyAds PopUnders v3 Start -->
<script type="text/javascript" src="https://js.juicyads.com/jp.php?c=34643323s244u4q2p2c413a444&u=https%3A%2F%2Funderholding.cz%2Fzlo"></script>
<!-- JuicyAds PopUnders v3 End -->

<!-- Page Content -->
<div class="container-fluid py-2">
    <div class="py-2"></div>

    <div class="row">
        <div class="col-md-8">

            <?php
            $success = $_GET['success'];
            if (!is_null($success)){ ?>
                <div class="alert alert-success" id="alert" role="alert">
                    Váš účet byl úspěšně založen, pro jeho aktivaci prosím dokončete registraci na svém emailu.
                    Pokud nebude váš účet aktivován, bude do 14 dní zrušen.
                </div>

                <script>
                    $("#alert").fadeTo(5000, 500).slideUp(500, function(){
                        $("#success-alert").slideUp(500);
                    });
                </script>

                <?php
            }
            ?>

            <div class="card m-4">
                <div class="card-body">
                    <form enctype="multipart/form-data" id="content_form" method="post" action="upload_api.php">
                        <div class="row">
                                <div class="col-md-9">
                                    <input name="author" type="hidden" value="<? echo $_SESSION["user"]["id"] ?>">
                                    <input name="pass" type="hidden" value="<? echo $_SESSION["user"]["pass"] ?>">
                                    <img style="max-height: 400px;" class="img img-fluid" id="img" src="" style="padding-bottom: 1em;">
                                    <textarea class="form-control" required type="text" name="content" id="content"></textarea>
                                    <br>
                                    <label class="small text-muted" for="example-text-input">Tento příspěvek uvidí: (celý internet)</label>
                                </div>
                                <div class="col-md-3">
                                    <a id="send" class="btn btn-dark w-100 py-1" style="color: white !important;">Odeslat váš názor</a>
                                    <label class="btn btn-dark w-100 py-1" style="margin-top: 1em;">
                                        Přidat soubor <input name="file_upload" onchange="preview_image(event)" id="file" type="file" hidden>
                                    </label>
                                </div>
                        </div>
                    </form>
                </div>
            </div>


            <?php
            $result = $conn->query('select c.*, a.val, u.display_name from tbContent c left join tbAnalysis a on c.id = a.content inner join tbUser u on c.author = u.id ORDER BY id desc');

            $count = 0;
            while ($row = $result->fetch_assoc()) {
            $count++;

            if ($count == 4)
            {
                $count = 0;
                ?>

                <div class="card m-4">
                    <div class="card-body">
                        <div class="embed-responsive">
                            <!-- JuicyAds v3.0 -->
                            <script type="text/javascript" data-cfasync="false" async src="//adserver.juicyads.com/js/jads.js"></script>
                            <ins id="670164" data-width="468" data-height="72"></ins>
                            <script type="text/javascript" data-cfasync="false" async>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':670164});</script>
                            <!--JuicyAds END-->
                        </div>
                    </div>
                </div>


                <?
            }

            ?>

            <div class="card m-4">

                <div class="card-header">
                    <?

                    $phpdate = strtotime( $row['created'] );
                    $mysqldate = date( 'd-m-Y H:i', $phpdate );

                    ?>
                    <? echo $row['display_name'] ?>: <div class="float-right"><? echo $mysqldate ?></div>
                </div>

                <div class="card-body">

                        <?
                        if ($row['content_type'] == "photo") {
                            echo '<div class="embed-responsive">';
                                echo '<img class="img img-fluid" style="padding-bottom: 1em;" src="'.$row['content_url'].'" alt="'.$row['content_url'].'">';
                            echo '</div>';

                            $json = json_decode($row['val'], true)['outputs'][0];

                            foreach ($json['data']['concepts'] as $analysis) {
                                echo "<span style='margin: 0.2em; padding: 0.7em;' class='badge badge-secondary'>{$analysis['name']}</span>";
                            }
                        }
                        else if ($row['content_type'] == "video") {
                            echo '<div class="embed-responsive embed-responsive-4by3">';
                                echo '<video class="embed-responsive-item" controls>';
                                    echo    '<source type="video/mp4" src="'.$row['content_url'].'">';
                                echo '</video>';
                            echo '</div>';
                        }
                        ?>


                    <?php
                        $size = 7;
                        if (strlen($row['description']) < 50) {
                            $size = 1;
                        }
                        else if (strlen($row['description']) < 100) {
                            $size = 3;
                        }
                        else if (strlen($row['description']) < 250) {
                            $size = 5;
                        }
                        else if (strlen($row['description']) > 320) {
                            $size = 7;
                        }

                        echo "<h{$size}>{$row['description']}</h{$size}";
                    ?>
                    <br>
                </div>

                <div class="card-footer">
                    <form action="comment_api.php" method="post" class="row">
                        <input type="hidden" value="<?echo $row['id']?>">
                        <div class="col-md-1"><div class="thumbs-up"><i style="color: red;" class="fa fa-thumbs-up fa-3x h-100 d-inline-block text-center"></i></div></div>
                        <div class="col-md-9"><input class="form-control w-100 h-100 d-inline-block"  type="text" placeholder="Komentář" name="comment"/></div>
                        <div class="col-md-2"><button class="btn btn-primary btn-lg w-100">Odeslat</button></div>
                    </form>
                </div>

            </div>

            <?php } ?>

        </div>

        <div class="col-md-4">

            <div class="py-2"></div>

            <div class="card py-4 advert sticky-top">
                <div class="py-5"></div>
                <div class="card-body">

                    <!-- JuicyAds v3.0 -->
                    <script type="text/javascript" data-cfasync="false" async src="//adserver.juicyads.com/js/jads.js"></script>
                    <ins id="670162" data-width="728" data-height="102"></ins>
                    <script type="text/javascript" data-cfasync="false" async>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':670162});</script>
                    <!--JuicyAds END-->

                    <!-- JuicyAds v3.0 -->
                    <script type="text/javascript" data-cfasync="false" async src="//adserver.juicyads.com/js/jads.js"></script>
                    <ins id="670156" data-width="468" data-height="72"></ins>
                    <script type="text/javascript" data-cfasync="false" async>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':670156});</script>
                    <!--JuicyAds END-->

                    <!-- JuicyAds v3.0 -->
                    <script type="text/javascript" data-cfasync="false" async src="//adserver.juicyads.com/js/jads.js"></script>
                    <ins id="670150" data-width="300" data-height="262"></ins>
                    <script type="text/javascript" data-cfasync="false" async>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':670150});</script>
                    <!--JuicyAds END-->

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

<script>
    function preview_image(event)
    {

        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('img');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);

    }

    $("#send").on("click", function () {
       $("#content_form").submit();
    });
</script>

<?php

require('partials/footer.php');

