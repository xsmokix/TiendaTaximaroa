<?php
$key1=$_POST['key1'];
$key2=$_POST['key2'];
$url = 'https://api.envioclickpro.com/api/v1/quotation';
$data = array('key1' => $key1, 'key2' => $key2);
$options = array(
    'http' => array(
    	'header'  => "Authorization: f2292d33-411f-4dfc-8f12-4cbcc468a160",
        'header'  => "Content-type: application/json",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);
if ($response === FALSE) { /* Handle error */ }
  $json_array=json_decode($response,true); 
 function display_array_recursive($json_rec){
		if($json_rec){
			foreach($json_rec as $key=> $value){
				if(is_array($value)){
					display_array_recursive($value);
				}else{
					echo $key.'--'.$value.'<br>';
				}	
			}	
		}	
	}
  	display_array_recursive($json_array);
?>