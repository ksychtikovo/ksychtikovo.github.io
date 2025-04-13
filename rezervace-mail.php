<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Příjemce
    $to = "podmolovam@gmail.cz"; // Sem dej svůj e-mail

    // Předmět e-mailu
    $subject = "Nová rezervace z Ksychtíkovo";

    // Sestavení zprávy
    $message = "Přišla nová rezervace z webu:\n\n";
    $message .= "Jméno: " . $_POST['jmeno'] . "\n";
    $message .= "Příjmení: " . $_POST['prijmeni'] . "\n";
    $message .= "Firma: " . $_POST['firma'] . "\n";
    $message .= "Požadované datum: " . $_POST['datum'] . "\n";
    $message .= "Počet hodin: " . $_POST['hodiny'] . "\n";
    $message .= "Telefon: " . $_POST['telefon'] . "\n";
    $message .= "Email: " . $_POST['email'] . "\n";
    $message .= "Poznámka: " . $_POST['poznamka'] . "\n";

    // Hlavičky
    $headers = "From: rezervace@ksychtikovo.cz" . "\r\n" .
               "Reply-To: " . $_POST['email'] . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Odeslání
    if (mail($to, $subject, $message, $headers)) {
        echo "Děkujeme, rezervace byla úspěšně odeslána.";
    } else {
        echo "Došlo k chybě při odesílání rezervace.";
    }
}
?>
