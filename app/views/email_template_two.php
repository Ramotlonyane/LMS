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

     <h2 style="font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; font-size: 16px; line-height: 1.2em; color: #111111; font-weight: 200; margin: 0px 0 10px; padding: 0;">APPLICATION FOR A LEAVE: YOUR RECOMMENDATION OR APPROVAL</h2>


<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: normal; margin: 0 0 10px; padding: 0;">Dear Mr./Mrs. <?php echo $recommender; ?>,</p>
<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: normal; margin: 0 0 10px; padding: 0;">The Details of the leave are as follows:</p>
										
									</td>
								</tr>
								<tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; padding: 0; ">
									<td style="text-align: center; background: #B2B2B2; color: #FFFFFF; font-size: 14px; margin: 0; padding: 0;">
										<table style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; width: 100%; margin: 0; border-collapse: collapse;background: #ffffff;">
											<thead>
												<tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
													<th>Applicant Name</th>
													<th>Start Date</th>
													<th>End Date</th>
													<th>Application Date</th>
													<th>Leave Type</th>
													<th>Number Of Days</th>
													<th>Leave Status</th>
												</tr>
											</thead>
											<tbody>
												<tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
													<td><?php echo $applicantName; ?></td>
													<td><?php echo $startDate; ?></td>
													<td><?php echo $endDate; ?></td>
													<td><?php echo $applicationDate; ?></td>   					
													<td><?php echo $leaveTypename; ?></td>
													<td><?php echo $numberOfDays; ?></td>   			
								<!--<td><?php echo "<a href='".base_url($hash)."'>URL</a>"; ?></td>-->
													<td></td>
												</tr>
											</tbody>	
										</table>
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