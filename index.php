<?php
require ('partials/db.php');
require('partials/auth.php');
require('partials/header.php');
require ('partials/nav.php');

?>

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
            $result = $conn->query('select * from tbContent ORDER BY id desc');

            $count = 0;
            while ($row = $result->fetch_assoc()) {
            $count++;

            if ($count == 5)
            {
                $count = 0;
                ?>

                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-format="fluid"
                     data-ad-layout-key="-6t+ed+2i-1n-4w"
                     data-ad-client="ca-pub-5036777483973833"
                     data-ad-slot="3703070085"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>


                <?
            }

            ?>

            <div class="card m-4">

                <div class="card-body">

                        <?
                        if ($row['content_type'] == "photo") {
                            echo '<div class="embed-responsive embed-responsive-4by3">';
                                echo '<img class="embed-responsive-item img img-fluid mx-auto d-block" style="padding-bottom: 1em;" src="'.$row['content_url'].'" alt="'.$row['content_url'].'">';
                            echo '</div>';
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
            </div>

            <?php } ?>

        </div>

        <div class="col-md-4">

            <div class="py-2"></div>

            <div class="card py-4 advert">
                <div class="card-body">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- banner-na-pravo -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-5036777483973833"
                         data-ad-slot="2553995168"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
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

