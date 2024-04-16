<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Überprüfe, ob eine Video-URL gesendet wurde
    if (!empty($_POST["video_url"])) {
        $video_url = $_POST["video_url"];
        
        // Hier kannst du den Code einfügen, um das Video herunterzuladen
        // Zum Beispiel:
        file_put_contents("video.mp4", file_get_contents($video_url));

        // Nach dem Download könntest du eine Bestätigung anzeigen oder den Benutzer zurückschicken
        // header("Location: index.html"); // Zurück zur Startseite
        // exit();
    }
}
?>

