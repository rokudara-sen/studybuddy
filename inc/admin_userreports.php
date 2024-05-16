<?php
    if (!($_SESSION['userrole'] === "admin")) {
        header("Location: index.php?page=home");
        exit();
    }
    require 'config/dbaccess.php';

    // Query to retrieve user data
    $sqlUsers = "SELECT * FROM report";
    $resultUsers = $conn->query($sqlUsers);
?>


<div class="container-admin-overview">
    <h2 class="admin-page-overview">Reports Overview</h2>

    <?php
    if ($resultUsers->num_rows > 0) {
        echo "<table class='table-overview'>
            <tr>
                <th class='th-overview'>ID</th>
                <th class='th-overview'>Reported User</th>
                <th class='th-overview'>Reported By</th>
                <th class='th-overview'>Reason</th>
            </tr>";

        while ($rowUser = $resultUsers->fetch_assoc()) {
            echo "<tr>
                    <td class='td-overview'>" . $rowUser["report_id"] . "</td>
                    <td class='td-overview'>" . $rowUser["reported_user"] . "</td>
                    <td class='td-overview'>" . $rowUser["reported_by"] . "</td>
                    <td class='td-overview'>" . $rowUser["reason"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Keine Benutzer gefunden.";
    }
    ?>
</div>
