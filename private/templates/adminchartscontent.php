<?php
include_once "private/connection.php";

$departmentQuery = "SELECT department, COUNT(department) as `count` FROM visits
                    INNER JOIN users ON visits.user_id = users.id
                    GROUP BY department";
$deparments = mysqli_query($db, $departmentQuery);
$departmentsLabels = [];
$departmentsCounts = [];
while ($row = mysqli_fetch_assoc($deparments)) {
    $departmentsLabels[] = $row["department"];
    $departmentsCounts[] = intval($row["count"]);
}

// convert to json arrays
$departmentsLabelsJs = json_encode($departmentsLabels);
$departmentsCountsJs = json_encode($departmentsCounts);

$purposeQuery = "SELECT purpose, COUNT(purpose) as `count` FROM visits
GROUP BY purpose";
$purposes = mysqli_query($db, $purposeQuery);
$purposesLabels = [];
$purposesCounts = [];
while ($row = mysqli_fetch_assoc($purposes)) {
    if (is_null($row['purpose'])) {
        continue;
    }
    $purposesLabels[] = $row['purpose'];
    $purposesCounts[] = intval($row['count']);
}

$purposesLabelsJs = json_encode($purposesLabels);
$purposesCountsJs = json_encode($purposesCounts);
?>


<h3>Visitors Charts</h3>
<h4>Visits per department</h4>
<div>
<canvas id="departmentChart"></canvas>
</div>
<h4>Visits per purpose</h4>
<div>
<canvas id ="purposeChart"></canvas>
</div>
<script>
var ctx = document.getElementById('departmentChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: <?= $departmentsLabelsJs ?>,
        datasets: [{
            label: "Number of Visitors",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: <?= $departmentsCountsJs ?>,
        }]
    },
    // Configuration options go here
    options: {}
});

var purposeCtx = document.getElementById('purposeChart').getContext('2d');
var purposeChart = new Chart(purposeCtx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: <?= $purposesLabelsJs ?>,
        datasets: [{
            label: "Number of Visitors",
            backgroundColor: 'rgb(99, 255, 132)',
            borderColor: 'rgb(99, 255, 132)',
            data: <?= $purposesCountsJs ?>,
        }]
    },
    // Configuration options go here
    options: {}
});
</script>