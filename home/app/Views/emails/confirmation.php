<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation d’inscription</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f8; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8; padding:20px;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; padding:25px;">
                    
                    <tr>
                        <td style="text-align:center;">
                            <h2 style="color:#2c3e50; margin-bottom:10px;">
                                FÉLICITATIONS ð
                            </h2>
                        </td>
                    </tr>

                    <tr>
                        <td style="color:#333333; font-size:15px; line-height:1.6;">
                            <p>Bonjour <strong><?= esc($name) ?></strong>,</p>

                            <p>
                                Votre inscription au <strong>webinaire offert sur l’art oratoire</strong> est confirmée.
                            </p>

                            <p style="background:#f1f5f9; padding:12px; border-radius:6px;">
                                <strong>Dimanche 8 février 2026</strong><br>
                                <strong>20h30 (heure de Lubumbashi)</strong>
                            </p>

                            <p>
                                Vous avez pris une excellente décision. Vous découvrirez comment dépasser la peur de parler en public et prendre la parole avec assurance.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding-top:20px;">
                            <h3 style="color:#2c3e50; font-size:16px;">
                                ð¹ Rejoignez notre communauté WhatsApp
                            </h3>

                            <p style="color:#333333; font-size:15px;">
                                Accédez au groupe privé des participants pour recevoir les informations importantes et échanger avec la communauté.
                            </p>

                            <p style="text-align:center; margin:20px 0;">
                                <a href="LIEN_WHATSAPP"
                                   style="background:#25D366; color:#ffffff; padding:12px 20px; text-decoration:none; border-radius:5px; font-weight:bold;">
                                    Rejoindre le groupe WhatsApp
                                </a>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding-top:10px;">
                            <h3 style="color:#2c3e50; font-size:16px;">
                                ð¹ Ce qui vous attend
                            </h3>

                            <ul style="color:#333333; font-size:15px; padding-left:18px;">
                                <li>Comprendre la puissance de la parole</li>
                                <li>Identifier les sources de la peur</li>
                                <li>Parler avec clarté et pertinence</li>
                                <li>Renforcer l’image de soi</li>
                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding-top:20px;">
                            <h3 style="color:#2c3e50; font-size:16px;">
                                Bonus : partagez et gagnez
                            </h3>

                            <p style="color:#333333; font-size:15px;">
                                Invitez une personne intéressée par l’art oratoire en partageant le lien d’inscription.
                            </p>

                            <p style="text-align:center;">
                                <a href="LIEN_WEBINAIRE"
                                   style="color:#1d4ed8; font-weight:bold;">
                                    Partager le lien du webinaire
                                </a>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding-top:30px; border-top:1px solid #e5e7eb; text-align:center;">
                            <p style="font-size:14px; color:#555555;">
                                <strong>Muzuri Académie</strong><br>
                                Développement personnel & leadership
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
