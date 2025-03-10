<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $toAdmin = "info@dukes-hundeschule.ch"; // 📌 Your email for receiving form submissions
    $toUser = $_POST["email"]; // 📌 User's email for confirmation

    // 📌 Form Data
    $anrede = $_POST["anrede"];
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $strasse = $_POST["strasse"];
    $plz = $_POST["plz"];
    $ort = $_POST["ort"];
    $mobil = $_POST["mobil"];
    $email = $_POST["email"];
    $geburtsdatum = $_POST["geburtsdatum"];
    $hundename = $_POST["hundename"];
    $hund_geburtsdatum = $_POST["hund_geburtsdatum"];
    $rasse = $_POST["rasse"];
    $chipnummer = $_POST["chipnummer"];
    $geschlecht = $_POST["geschlecht"];
    $kastriert = $_POST["kastriert"];
    $uebernahme = $_POST["uebernahme"];
    $kurs = $_POST["kurs"];
    $nachricht = $_POST["nachricht"];

    // 📩 Email to Admin
    $subjectAdmin = "Neue Kursbuchung von $vorname $nachname";
    $messageAdmin = "
        Neue Kursbuchung:

        🧑 Anrede: $anrede
        👤 Name: $vorname $nachname
        🏠 Adresse: $strasse, $plz $ort
        📞 Mobil: $mobil
        📧 E-Mail: $email
        🎂 Geburtsdatum: $geburtsdatum

        🐶 Hundename: $hundename
        🎂 Geburtsdatum Hund: $hund_geburtsdatum
        🐕 Rasse: $rasse
        🔢 Chipnummer: $chipnummer
        ⚥ Geschlecht: $geschlecht
        ✂️ Kastriert: $kastriert
        📆 Übernahme des Hundes: $uebernahme

        📚 Kurs: $kurs
        💬 Nachricht: $nachricht
    ";

    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

    // 📩 Email to User (Confirmation)
    $subjectUser = "Bestätigung Ihrer Kursbuchung bei Duke's Hundeschule";
    $messageUser = "
        Hallo $vorname $nachname,

        Vielen Dank für Ihre Buchung! Hier sind die Details:

        🐶 Hundename: $hundename
        📚 Kurs: $kurs
        📆 Übernahme des Hundes: $uebernahme

        Wir melden uns bald mit weiteren Informationen.

        Liebe Grüsse,
        Duke’s Hundeschule
    ";

    // 📧 Send emails
    $successAdmin = mail($toAdmin, $subjectAdmin, $messageAdmin, $headers);
    $successUser = mail($toUser, $subjectUser, $messageUser, "From: $toAdmin\r\nContent-Type: text/plain; charset=UTF-8");

    // 🏁 Response to the form
    if ($successAdmin && $successUser) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid_request";
}
?>
