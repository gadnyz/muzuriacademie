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
                        Votre inscription au webinaire offert sur l’art oratoire est confirmée.
                    </p>

                    <p style="background:#f1f5f9; padding:12px; border-radius:6px;">
                        <strong>Dimanche 16 Mai 2026 à 20h30 (heure de Lubumbashi)</strong>
                    </p>

                    <p>
                        Vous avez pris une excellente décision. Vous découvrirez comment dépasser la peur de parler en public et prendre la parole avec assurance.
                    </p>
                </td>
            </tr>

            <tr>
                <td style="padding-top:10px;">
                
                    <p style="color:#333333; font-size:15px;">
                        <strong>Lien du webinaire</strong> <br>
                    </p>
                    <p>
                        Cliquez sur le bouton ci-dessous pour accéder au webinaire sur google meet.
                    </p>

                    <p style="text-align:center; margin:18px 0;">
                        <a href="https://meet.google.com/fng-xyfn-rux"
                           target="_blank"
                           style="background:#0080ff; color:#ffffff; padding:12px 22px; text-decoration:none; border-radius:5px; font-weight:bold; display:inline-block;">
                            REJOINDRE LE WEBINAIRE
                        </a>
                    </p>
                </td>
            </tr>

            <tr>
                <td style="padding-top:10px;">
                
                    <p style="color:#333333; font-size:15px;">
                        <strong>Rejoignez notre communauté WhatsApp</strong> <br>
                    </p>
                    <p>
                        Accédez au groupe privé des participants pour recevoir les informations importantes et échanger avec la communauté.
                    </p>

                    <p style="text-align:center; margin:18px 0;">
                        <a href="https://chat.whatsapp.com/ETh4aDQxFPI08vhskHYFqW"
                           target="_blank"
                           style="background:#25d366; color:#ffffff; padding:12px 22px; text-decoration:none; border-radius:5px; font-weight:bold; display:inline-block;">
                            Rejoindre le groupe WhatsApp
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
