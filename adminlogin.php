<?php

include_once "private/templates/header.php";

?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="POST" action="loginhandler.php">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Username"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success form-control">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

include_once "private/templates/footer.php";

?>