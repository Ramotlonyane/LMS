<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Anil Labs - Codeigniter mail templates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body style=" background: #E7E8EA; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; -webkit-font-smoothing: antialiased; height: 100%; -webkit-text-size-adjust: none; width: 100% !important; margin: 0; padding: 0; position: absolute;">
	<table style="width: 100%;height: 100%;"">
		<tr>
			<td align="center" valign="middle" height="100" style="">
				<table class="body-wrap" style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0 auto;border-collapse: collapse;">
					<tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; padding: 0; ">
						<td class="container" style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6em;clear: both !important;display: block !important;margin: 0 auto; border-collapse: collapse;width: 600px;">
							<table style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; width: 100%; margin: 0; border-collapse: collapse;background: #ffffff;">
								<tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
									<td style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding-top: 30px; padding-bottom: 30px; padding-left: 30px; padding-right: 30px;">

     <h2 style="font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; font-size: 16px; line-height: 1.2em; color: #111111; font-weight: 200; margin: 0px 0 10px; padding: 0;">YOUR LEAVE APPLICATION STATUS</h2>


<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: normal; margin: 0 0 10px; padding: 0;">Dear Mr./Mrs. <?php echo $name; ?>,</p>
<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: normal; margin: 0 0 10px; padding: 0;">Your leave status is <?php echo $leaveStatusname; ?> for <?php echo $leaveTypename; ?> you applied for. Your remaining leave days for <?php echo $leaveTypename; ?> is <?php echo $leave_remaining; ?></p>
										
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>