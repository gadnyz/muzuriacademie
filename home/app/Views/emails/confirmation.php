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
                        FÉLICITATIONS 🎉
                    </h2>
                </td>
            </tr>

            <tr>
                <td style="color:#333333; font-size:15px; line-height:1.6;">
                    <p>Bonjour <strong><?= esc($name) ?></strong>,</p>

                    <p>
                        Votre inscription à la <strong>conférence sur l’art oratoire</strong> du <strong>[DATE]</strong> à <strong>Moon Palace</strong> est bien confirmée.
                        Nous sommes ravis de vous compter parmi nous.
                    </p>

                    <p style="background:#f1f5f9; padding:12px; border-radius:6px;">
                        <strong>Lieu :</strong> Hôtel Moon Palace de Kolwezi
                    </p>

                    <p>
                        Votre invitation est jointe à ce message. Merci de la présenter à l’entrée le jour de l’événement.
                    </p>
                </td>
            </tr>

            <tr>
                <td style="padding-top:10px;">
                    <div style="text-align:center; background:#f8fafc; padding:16px; border-radius:8px; border:1px solid #e2e8f0;">
                        <p style="margin:0; font-weight:bold; color:#2c3e50;">
                            Votre invitation est jointe en annexe du présent mail.
                        </p>
                    </div>
                </td>
            </tr>

            <!-- WHATSAPP GROUP -->
            <tr>
                <td style="padding-top:10px;">
                    <h3 style="color:#2c3e50; font-size:16px;">
                        Rejoignez le groupe WhatsApp
                    </h3>

                    <p style="color:#333333; font-size:15px;">
                        Rejoignez notre groupe WhatsApp pour toutes les informations pratiques :
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

            <tr>
                <td style="padding-top:10px; color:#333333; font-size:15px; line-height:1.6;">
                    <p>À très bientôt,</p>
                    <p>Signature</p>
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
