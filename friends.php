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
            <!-- JuicyAds v3.0 -->
            <script type="text/javascript" data-cfasync="false" async src="//adserver.juicyads.com/js/jads.js"></script>
            <ins id="670159" data-width="774" data-height="302"></ins>
            <script type="text/javascript" data-cfasync="false" async>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':670159});</script>
            <!--JuicyAds END-->
            <!-- JuicyAds v3.0 -->
            <script type="text/javascript" data-cfasync="false" async src="//adserver.juicyads.com/js/jads.js"></script>
            <ins id="670160" data-width="8" data-height="52"></ins>
            <script type="text/javascript" data-cfasync="false" async>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':670160});</script>
            <!--JuicyAds END-->
        </div>


    </div>


</div>
