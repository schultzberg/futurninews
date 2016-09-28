<?php /**/ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width">
	</head>
	<link rel="stylesheet" type="text/css" href="<?= plugins_url('futurninews') . '/style.css' ?>" />
	<body>
	<div class="container">
	
		<table border="0" cellspacing="0" width="100%" class="block-logo">
			<tr>
				<td width="16"></td>
				<td style="padding-top:20px;padding-bottom:20px;">
					<div class="mw-720">  
						<table width="100%">
							<tr>
								<td>
									<span class="header-text-bold"><a href="http://ikea.today" style="color:#000;">IKEA.today</a></span>
									<?php if( get_field( 'header' ) ): ?>
										<span class="header-text"><?= the_field( 'header' )?></span>
									<?php endif; ?>
								</td>
								<td align="right" style="vertical-align:top; padding-top:5px;">
									<a href="http://ikea.today"><img class="logo" src="<?= plugins_url('futurninews' ) . '/img/logo.png' ?>" alt="Ikea logotype" /></a>
								</td> 
							</tr>
						</table>
					</div>
				</td>
				<td width="16"></td>
			</tr>
		</table>