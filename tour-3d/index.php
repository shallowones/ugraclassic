<?
$outFile = 'vhod_out.swf';
if (isset($_GET['out'])):
	switch(trim($_GET['out'])):
        case 'ulic_ven_out':
            $outFile = 'ulic_ven_out.swf';
            break;
		case 'uli_len_out':
			$outFile = 'uli_len_out.swf';
			break;
		case 'organ':
			$outFile = 'organ_out.swf';
			break;
		case 'zal':
			$outFile = 'zal_out.swf';
			break;
        case 'press_out':
            $outFile = 'press_out.swf';
            break;
        case 'trans_out':
            $outFile = 'trans_out.swf';
            break;
		case 'sovet':
			$outFile = 'sovet_out.swf';
			break;
        case 'vena_out':
            $outFile = 'vena_out.swf';
            break;
		case 'art_kafe':
			$outFile = 'art_kafe_out.swf';
			break;
        case '2flot_out':
            $outFile = '2flot_out.swf';
            break;
        case 'oniks_out':
            $outFile = 'oniks_out.swf';
            break;
		default:
			$outFile = 'vhod_out.swf';
	endswitch;
endif;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>Виртуальный 3D тур по «Югра-Классик»</title>
		<script type="text/javascript" src="p2q_embed_object.js">
		</script>
		<style type="text/css" title="Default">
			body, div, h1, h2, h3, span, p {
				font-family: Verdana,Arial,Helvetica,sans-serif;
				color: #000000; 
			}
			body {
				/* fullscreen */
				margin: 0px;
				overflow:hidden; /* disable scrollbars */
			}
			html, body {
				height:100%;
				font-size: 10pt;
				background : #ffffff; 
			}
			h1 {
				font-size: 18pt;
			}
			h2 {
				font-size: 14pt;
			}
			.warning {
				font-weight: bold;
			}
		</style>	
	</head>
	<body>
		<script type="text/javascript">
<!--
			if ((window.p2q_Version) && (window.p2q_Version>=2.0)) {
			// Check to see if the version meets the requirements for playback
			var flashvars="";
			p2q_EmbedFlash('<?=$outFile?>','100%','100%','allowFullScreen','true','bgcolor','#ffffff','FlashVars',flashvars);
				
				if (!DetectFlashVer(9,0,0)) {
					document.write('<p class="warning">This content requires Adobe Flash Player Version 9 or higher. '
								 + '<a href="http://www.adobe.com/go/getflash/">Get Flash<\/a><\/p>');
				}
			} else {
				document.writeln('<p class="warning">p2q_embed_object.js is not included or it is too old! Please copy this file into your html directory.<\/p>');
			}
//-->
		</script>
		<noscript>
			<p class="warning">Please enable Javascript!</p>
		</noscript>
	</body>
</html>
