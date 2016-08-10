<?php

	echo 'This is a test module by Santhosh<br/><br/><br/>';
	

	//echo '<pre/>';
	if ((isset($_POST['actUpdateWHMCS'])) && ($_POST['actUpdateWHMCS'] == 'updateWHMCS')) {
		$url = 'https://api.github.com/repos/santhoshsuvarna/santestmodule/releases/latest';
		$reslt = execCurl($url);

		echo '<pre/>';
		print_r($reslt);
		
		
		$new_ver = $reslt->tag_name;
		

		// this is test
		
		
		
		if ($new_ver > MODULE_VER) {
			//download zip file
			$download_url = $reslt->zipball_url;
			//$download_url = 'https://github.com/santhoshsuvarna/santestmodule/archive/'.$new_ver.'.zip';
			
			/*
			$context = stream_context_create(array('http' => array(
					'header' => 'User-Agent: sistecs',
			)));
			$File = file_get_contents($download_url,false, $context);
			$SaveFile = fopen("master.zip", "w");
			fwrite($SaveFile, $File);
			fclose($SaveFile);
			
			echo 'file downloaded<br/>';
			*/
			
			/*
			$zip = new ZipArchive;
			if ($zip->open('master1.zip') === TRUE) {
					$zip->extractTo('liqwebtmp');
					$zip->close();
					
					if(!is_dir('liqweb')){mkdir('liqweb');}
					if(!is_dir('liqweb/modules')){mkdir('liqweb/modules');}
					cpy('liqwebtmp/LiquidWeb-WHMCS-Plugin-master/modules','liqweb/modules');
					if(!is_dir('liqweb/includes')){mkdir('liqweb/includes');}
					cpy('liqwebtmp/LiquidWeb-WHMCS-Plugin-master/includes','liqweb/includes');
					rrmdir('liqwebtmp');
					//unlink('master.zip');
					
					echo 'Updated<br/>';
			} else {
					echo 'failed<br/>';
			}
			*/
			
			
			
		}
			
	}
	
function execCurl($url) {
    $ch = curl_init();  
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		//curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Awesome-Octocat-App'));
    $output=curl_exec($ch);
		$json = json_decode($output);
		//echo '<pre/>';
		//print_r(curl_error($ch));
		//var_dump($ch);
		//echo '<br/>';
    curl_close($ch);
		//var_dump($json);
		//echo '<br/>';
    return $json;
}

	
	
?>	
<form name="frmUpdateWHMCS" action="addonmodules.php?module=santestmodule&action=update" method="POST">
	<div align="left">
		<input class="button" type="submit" value="Update latest version"/>
		<input type="hidden" name="actUpdateWHMCS" value="updateWHMCS"/>
	</div>
</form>



