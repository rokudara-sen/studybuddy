<?php
    if (!($_SESSION['userrole'] === "admin")) {
        header("Location: index.php?page=home");
        exit();
    }
    require 'config/dbaccess.php';

    // Query to retrieve user data
    $sqlUsers = "SELECT * FROM users";
    $resultUsers = $conn->query($sqlUsers);
?>


<div class="container-admin-overview">
    <h2 class="admin-page-overview">User Overview</h2>

    <?php
    if ($resultUsers->num_rows > 0) {
        echo "<table class='table-overview'>
            <tr>
                <th class='th-overview'>ID</th>
                <th class='th-overview'>Vorname</th>
                <th class='th-overview'>Nachname</th>
                <th class='th-overview'>Email</th>
                <th class='th-overview'>Username</th>
                <th class='th-overview'>User-Typ</th>
                <th class='th-overview'>Action</th>
            </tr>";

        while ($rowUser = $resultUsers->fetch_assoc()) {
            echo "<tr>
                    <td class='td-overview'>" . $rowUser["userID"] . "</td>
                    <td class='td-overview'>" . $rowUser["vorname"] . "</td>
                    <td class='td-overview'>" . $rowUser["nachname"] . "</td>
                    <td class='td-overview'>" . $rowUser["email"] . "</td>
                    <td class='td-overview'>" . $rowUser["username"] . "</td>
                    <td class='td-overview'>" . $rowUser["userTyp"] . "</td>
                    <td class='td-overview'>
                        <a class='a-overview' href='index.php?page=admin_edit_user&userID=" . $rowUser['userID'] . "'>Profil bearbeiten</a> |
                        <a class='a-overview' href='index.php?page=admin_change_password&userID=" . $rowUser['userID'] ."&username=" . $rowUser['username'] . "'>Passwort ändern</a> | ";
            echo "             
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Keine Benutzer gefunden.";
    }
    ?>
</div>