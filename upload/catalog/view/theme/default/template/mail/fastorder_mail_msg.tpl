<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $subject?></title>
    </head>
    <body>
        <div style="padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
            <h1 class="text-center" style="box-sizing: border-box; margin: 20px 0px 10px; font-size: 36px; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-weight: 500; line-height: 1.1; color: #333333; text-align: center;"><?php echo $subject?></h1>
                <table style="box-sizing: border-box; border-spacing: 0px; border-collapse: collapse;  width: 100%; margin-bottom: 20px; border: 1px solid #dddddd; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;">
                <thead style="box-sizing: border-box;">
                    <tr style="box-sizing: border-box;">
                    <th style="box-sizing: border-box; padding: 8px; text-align: center; line-height: 1.42857; vertical-align: bottom; border-width: 0px 1px 2px; border-bottom-style: solid; border-bottom-color: #dddddd; border-right-style: solid; border-left-style: solid; border-right-color: #dddddd; border-left-color: #dddddd;" colspan="2"><?php echo $text_fastorder_mail_msg_data?></th>
                    </tr>
                </thead>
                <tbody style="box-sizing: border-box;">
                    <tr style="box-sizing: border-box; background-color: #f9f9f9;">
                        <td style="box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: top; border: 1px solid #dddddd;"><?php echo $text_fastorder_name?>:</td>
                        <td style="box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: top; border: 1px solid #dddddd;"><span style="box-sizing: border-box; font-weight: bold;"><?php echo $name?></span></td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td style="box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: top; border: 1px solid #dddddd;"><?php echo $text_fastorder_phone?>:</td>
                        <td style="box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: top; border: 1px solid #dddddd;"><span style="box-sizing: border-box; font-weight: bold;"><?php echo $phone?></span></td>
                    </tr>
                    <tr style="box-sizing: border-box; background-color: #f9f9f9;">
                        <td style="box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: top; border: 1px solid #dddddd;"><?php echo $text_fastorder_mail?>:</td>
                        <td style="box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: top; border: 1px solid #dddddd;"><span style="box-sizing: border-box; font-weight: bold;"><?php echo $mail?></span></td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td style="box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: top; border: 1px solid #dddddd;"><?php echo $text_fastorder_comment?>:</td>
                        <td style="box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: top; border: 1px solid #dddddd;"><i style="box-sizing: border-box;"><?php echo $comment?></i></td>
                    </tr>
                    <tr style="box-sizing: border-box; background-color: #f9f9f9;">
                        <td style="box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: top; border: 1px solid #dddddd;" rowspan="2"></td>
                        <td style="box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: top; border: 1px solid #dddddd;" colspan="2"><span style="box-sizing: border-box; font-weight: bold;"><?php echo $text_fastorder_mail_msg_order?>:</span> <span class="text-success" style="box-sizing: border-box; font-weight: bold; color: #3c763d;"><?php echo $products ?></span></td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td style="box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: top; border: 1px solid #dddddd;"><span style="box-sizing: border-box; font-weight: bold;"><?php echo $text_fastorder_mail_msg_price?>:</span> <span class="text-danger" style="box-sizing: border-box; font-weight: bold; color: #a94442;"><?php echo $price?></span></td>
                    </tr>
                </tbody>
            </table>

            <p style="float:right;"><?php echo $config_name?></p>
        </div>
    </body>
</html>
