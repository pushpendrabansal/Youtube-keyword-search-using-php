<?php

require_once __DIR__ . '/vendor/autoload.php';

$DEVELOPER_KEY = 'Key Here';

$client = new Google_Client();
$client->setDeveloperKey($DEVELOPER_KEY);
$youtube = new Google_Service_YouTube($client);
$value = $youtube->search->listSearch('id,snippet', array(
	      'q' => $_POST['search'],
	      'maxResults' => 10,
	    ));       
if(count($value['items'])!=0){
    for($i=0;$i<count($value['items']);$i++){  

    	echo('<div class="col-md-3 colums"><div class="title">');
    	echo substr($value['items'][$i]['snippet']['title'],0,40);
    	echo('</div>');

    	//description
    	echo('<div class="description">');
    	echo substr($value['items'][$i]['snippet']['description'],0,80);
    	echo('</div>');

    	echo('<div class="image">');
    	echo '<a href="https://www.youtube.com/watch?v='.$value['items'][$i]['id']['videoId'].'"><img src="'.$value['items'][$i]['snippet']['thumbnails']['default']['url'].'"></a>';	
    	echo('</div> </div>');

    }
} 
else{
	echo('No Result Found!');
}
?>