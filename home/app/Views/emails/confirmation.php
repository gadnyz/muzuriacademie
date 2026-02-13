<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation d'inscription</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f8; font-family:Arial, Helvetica, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8; padding:20px;">
    <tr>
        <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; padding:25px;">

            <tr>
                <td style="text-align:center;">
                    <h2 style="color:#2c3e50; margin-bottom:10px;">
                        FÉLICITATIONS  🎉
                    </h2>
                </td>
            </tr>

            <tr>
                <td style="color:#333333; font-size:15px; line-height:1.6;">
                    <p>Bonjour <strong><?= esc($name) ?></strong>,</p>

                    <p>
                        Votre inscription à la <strong>Session de clôture de la formation - ART ORATOIRE</strong> est bien confirmée.
                        Nous sommes ravis de vous compter parmi nous.
                    </p>

                    <p style="background:#f1f5f9; padding:12px; border-radius:6px;">
                        <strong>Hôtel Moon Palace de Kolwezi 
                        | Dimanche 22 février 2026 à 15h30</strong>
                    </p>

                    <p>
                        Votre invitation est jointe à ce mail. Merci de la présenter à l’entrée le jour de l’événement.
                    </p>
                </td>
            </tr>

            <!-- WHATSAPP GROUP -->
            <tr>
                <td style="padding-top:10px;">
                
                    <p style="color:#333333; font-size:15px;">
                        <strong>Rejoignez notre groupe WhatsApp pour toutes les informations pratiques</strong>
                    </p>

                    <p style="text-align:center; margin:18px 0;">
                        <a href="https://chat.whatsapp.com/ETh4aDQxFPI08vhskHYFqW"
                           target="_blank"
                           style="background:#25d366; color:#ffffff; padding:12px 22px; text-decoration:none; border-radius:5px; font-weight:bold; display:inline-block;">
                            Lien du groupe WhatsApp
                        </a>
                    </p>
                </td>
            </tr>

            <!-- SIGNATURE -->
            <tr>
                <td style="padding-top:30px; border-top:1px solid #e5e7eb; text-align:center;">
                    <p style="font-size:14px; color:#555555; line-height:1.6;">
                        <strong>Muzuri Académie</strong><br>
                        Développement personnel et leadership<br><br>
                        +243 996 719 236<br> 
                        +243 803 395 086
                    </p>
                </td>
            </tr>

        </table>

    </td>
</tr>

</table>

</body>
</html>
