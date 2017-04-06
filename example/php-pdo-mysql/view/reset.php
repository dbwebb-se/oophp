<?php
// Restore the database to its original settings
$file   = "sql/setup.sql";
$mysql  = "/usr/bin/mysql";
$output = null;

// Extract hostname and databasename from dsn
$dsnDetail = [];
preg_match("/mysql:host=(.+);dbname=(.+)/", $databaseConfig["dsn"], $dsnDetail);
$host = $dsnDetail[1];
$database = $dsnDetail[2];
$login = $databaseConfig["login"];
$password = $databaseConfig["password"];

if (isset($_POST["reset"]) || isset($_GET["reset"])) {
    $cmd = "$mysql -h{$host} -u{$login} -p{$password} $database < $file 2>&1";
    $res = exec($cmd);
    $output = "<p>The database is reset to its default content:<br/><code>{$cmd}</code></p><p>{$res}</p>";
}

?>
<form method="post">
    <input type="submit" name="reset" value="Reset database">
    <?= $output ?>
</form>
