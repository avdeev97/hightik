<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Überprüfe, ob eine Video-URL gesendet wurde
    if (!empty($_POST["video_url"])) {
        $video_url = $_POST["video_url"];

        // Sicherstellen, dass die URL gültig ist
        if (filter_var($video_url, FILTER_VALIDATE_URL)) {
            // Dateinamen basierend auf der Video-URL generieren
            $file_name = basename(parse_url($video_url, PHP_URL_PATH));

            // Versuche, das Video herunterzuladen
            $video_content = @file_get_contents($video_url);

            if ($video_content !== false) {
                // Video erfolgreich heruntergeladen, speichere es
                file_put_contents("downloads/$file_name", $video_content);

                // Bestätigungsnachricht oder Weiterleitung
                echo "Das Video wurde erfolgreich heruntergeladen.";
                // Du könntest auch den Benutzer zur Startseite zurückschicken
                // header("Location: index.html");
                exit();
            } else {
                // Fehler beim Herunterladen des Videos
                echo "Ein Fehler ist beim Herunterladen des Videos aufgetreten.";
            }
        } else {
            // Ungültige Video-URL
            echo "Die eingegebene Video-URL ist ungültig.";
        }
    } else {
        // Keine Video-URL gesendet
        echo "Es wurde keine Video-URL gesendet.";
    }
}
?>


