<?php
if (isset($_GET['url'])) {
	
	$url=$_GET['url'];
	$url_headers = @get_headers($url);

	if(strpos($url_headers[0],'200')){
		
		$tags = get_meta_tags($url);
		echo "<pre>";
		$title=$description=$image="unavailable";

		if(isset($tags['title'])){
			$title=$tags['title'];
		}
		if(isset($tags['twitter:description'])){
			$description=$tags['twitter:description'];
		}
		if(isset($tags['twitter:image'])){
			$image=$tags['twitter:image'];
		}

		$data = [ 'title' => $title , 'description' => $description , 'image' => $image];
	
		$response=json_encode($data);
		echo $response;

	}
	else{
		echo json_encode("url does not exist");
	}
}
else{
	echo json_encode("no url input");
}
?>