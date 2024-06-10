<?php
if ($_SESSION['userrole'] !== "admin") {
    header("Location: index.php?page=home");
    exit();
}
require 'config/dbaccess.php';

// Query to retrieve user reports
$sqlReports = "SELECT * FROM report";
$resultReports = $conn->query($sqlReports);
?>

<div class="container-admin-overview">
    <h2 class="admin-page-overview">Reports Overview</h2>

    <?php
    if ($resultReports->num_rows > 0) {
        echo "<table class='table-overview'>
            <tr>
                <th class='th-overview'>ID</th>
                <th class='th-overview'>Reported User</th>
                <th class='th-overview'>Reported By</th>
                <th class='th-overview'>Reason</th>
            </tr>";

        while ($rowReport = $resultReports->fetch_assoc()) {
            echo "<tr>
                    <td class='td-overview'>" . htmlspecialchars($rowReport["report_id"]) . "</td>
                    <td class='td-overview'>" . htmlspecialchars($rowReport["reported_user"]) . "</td>
                    <td class='td-overview'>" . htmlspecialchars($rowReport["reported_by"]) . "</td>
                    <td class='td-overview'>" . htmlspecialchars($rowReport["reason"]) . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Keine Reports gefunden.";
    }

    $conn->close();
    ?>
</div>
