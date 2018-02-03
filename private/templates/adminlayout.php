<?php

include_once "private/session.php";
ensureAdmin(); //make page only visible to admin users

// include the header template containing the nav bar
include_once "private/templates/header.php";

?>

<div class="container">
    <div class="row">
        <!-- the admin layout has 2 cols, one for the navigation menu items
        and the other for the page content -->

        <!-- menu items column -->
        <div class="col-md-3">
            <!-- use a list group for the menu -->
            <ul class="list-group">
                <li class="list-group-item"><a href="adminviewusers.php">View Employees</a></li>
                <li class="list-group-item"><a href="adminaddusers.php">Add Employee</a></li>
                <li class="list-group-item"><a href="adminviewvisits.php">View Visits</a></li>
                <li class="list-group-item"><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <!-- content column -->
        <div class="col-md-9">
            <!-- wrap the content in a panel to make it look good with
            a solid background -->
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <?php 
                    // placeholder variable for page content
                    echo $pageContent; 
                    
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php

// include the footer template
include_once "private/templates/footer.php";

?>