<?php
require ('partials/db.php');
require('partials/auth.php');
require('partials/header.php');
require ('partials/nav.php');
?>

<div class="container-fluid">


    <div class="py-3"></div>

    <div class="row">

        <div class="col-md-4">
            <h3>Vaši přátelé:</h3>
            <div class="card">
                <div class="card-body" style="height: 80vh; overflow-y: scroll;">
                    <?
                        $sql = "select u2.display_name from tbUser u inner join tbFriendship f1 on u.id = f1.user1 inner join tbUser u2 on u2.id = f1.user2 where u.id = {$_SESSION['user']['id']}";
                        $result = $conn->query($sql);

                        $count = 0;
                        while ($row = $result->fetch_assoc()) {
                            $count++;
                            if ($row['id'] != $_SESSION['user']['id']) {
                                ?>

                                <div class="card">
                                    <div class="card-body">
                                        <h5><? echo $row['display_name'] ?></h5>
                                        <a class="btn btn-sm btn-danger" href="add_friend.php?user=<? echo $row['id'] ?>&id=<? echo $_SESSION['user']['id'] ?>">oddělat kamaráda</a>
                                    </div>
                                </div>
                                <br>

                                <?
                            }
                        }

                    $sql = "select u2.display_name from tbUser u inner join tbFriendship f1 on u.id = f1.user2 inner join tbUser u2 on u2.id = f1.user1 where u.id = {$_SESSION['user']['id']}";
                    $result = $conn->query($sql);

                    $count = 0;
                    while ($row = $result->fetch_assoc()) {
                        $count++;
                        if ($row['id'] != $_SESSION['user']['id']) {
                            ?>

                            <div class="card">
                                <div class="card-body">
                                    <h5><? echo $row['display_name'] ?></h5>
                                    <a class="btn btn-sm btn-danger" href="add_friend.php?user=<? echo $row['id'] ?>&id=<? echo $_SESSION['user']['id'] ?>">oddělat kamaráda</a>
                                </div>
                            </div>
                            <br>

                            <?
                        }
                    }
                    ?>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <h5>Lidi kteří se mohou stát vašimi přáteli:</h5>
            <div class="card">
                <div class="card-body" style="height: 80vh; overflow-y: scroll;">
                    <?

                    $result = $conn->query('select * from tbUser ORDER BY id desc');

                    $count = 0;
                    while ($row = $result->fetch_assoc()) {
                        $count++;
                        if ($row['id'] != $_SESSION['user']['id']) {
                            ?>

                            <div class="card">
                                <div class="card-body">
                                    <h5><? echo $row['display_name'] ?></h5>
                                    <a class="btn btn-sm btn-success" href="add_friend.php?user=<? echo $row['id'] ?>&id=<? echo $_SESSION['user']['id'] ?>">udělat kamaráda</a>
                                </div>
                            </div>
                            <br>

                            <?
                        }
                    }

                    ?>
                </div>
            </div>
        </div>


        <div class="col-md-4">
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


</div>
