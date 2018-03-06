<?php
    include_once "private/templates/header.php";
?>

    <div class ="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="jumbotron">
                 <h1>Welcome to Africa Nazarene University</h1>
                </div>
                <div class="panel panel-default">
                    <div class="panel body">
                        <ul class="nav nav-tabs nav-justified">
                         <li class="<?= $activeTab == 'signin'? 'active': '' ?>"><a href="index.php">Sign In</a></li>
                        <li class="<?= $activeTab == 'signout'? 'active': '' ?>"><a href="visitorsignout.php">Sign Out</a></li>
                        </ul>

                <div class="tab-content">
                    <?= $pageContent ?>
                </div>

            </div>
        </div>

    </div>
</div>

<?php
include_once "private/template/footer.php";
?>


