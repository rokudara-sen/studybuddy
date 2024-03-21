<?php
   //check which/if session is set

?>

<div>
        <form action="" method="post">

                <input type="text" name="userVornamechange" id="userVornamechange" placeholder="Vorname ändern" ><br>

                <input type="text" name="userNachnamechange" id="userNachnamechange" placeholder="Nachname ändern" ><br>

                <input type="text" name="usernamechange" id="usernamechange" placeholder="Username ändern"><br>

                <input type="email" name="userEmailchange" id="userEmailchange" placeholder="Email ändern"><br>

                <button type="submit">Ändern</button><br>
        </form>
<br><br>
        <form action="" method="post">
                <input type="password" id="altespasswort" name="altespasswort" placeholder="altes Passwort" minlength="6" maxlength="64"  required><br>

                <input type="password" id="userPasswordchange" name="userPasswordchange" placeholder="Passwort ändern" minlength="6" maxlength="64"  required><br>

                <button type="submit">Ändern</button>
        </form>
</div>