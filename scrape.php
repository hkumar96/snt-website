<?php
	$access_token = "1600505566929296|XcDs3N2LG5hTANnjAV2nXGpdjK4";
	function get_images($access_token){
		$fields = "id,name,link";
		$fb_page_id = "200904643352333";

		$json_link = "https://graph.facebook.com/v2.6/{$fb_page_id}/photos?fields={$fields}&access_token={$access_token}";

		$json_file = file_get_contents($json_link);

		$obj = json_decode($json_file, true, 512, JSON_BIGINT_AS_STRING);
		$album_count = count($obj['data']);

		$img_src_url = "https://graph.facebook.com/v2.6/";
		$img_result = "";
		$alt_text = "Science and Technology Council,IITK shared a photo";
		for ($i=0; $i < 4 && $i < $album_count ; $i++) { 
			$id = isset($obj['data'][$i]['id'])? $obj['data'][$i]['id']:"";
			$name = isset($obj['data'][$i]['name'])?$obj['data'][$i]['name']:$alt_text;
			$allowed_length = 120;
			if (strlen($name)> $allowed_length){
				$name = substr($name,0,$allowed_length)."...";
			}
			$url_name = urlencode($name);
			$link = isset($obj['data'][$i]['link'])?$obj['data'][$i]['link']:"";
			// $description = isset($obj['data'][$i]['description'])?$obj['data'][$i]['description']:"";
			// $cover_photo = 	isset($obj['data'][$i]['cover_photo']['id'])?$obj['data'][$i]['cover_photo']['id']:"";
			// $count = isset($obj['data'][$i]['count'])?$obj['data'][$i]['count']:"";

			$img_src_url = "https://graph.facebook.com/v2.6/";
			$img_src_url .= "{$id}/picture?access_token={$access_token}";

			$img_result .= "<li>\n";
			$img_result .= "<img src = '{$img_src_url}'  data-description = '{$name}' data-large-src = '{$img_src_url}'/>\n";
			$img_result .= "</li>";
		}
		return $img_result;	
	}

	function get_news($access_token,$num_result){
		$fields = "id,object_id,story,link,status_type,message";
		$fb_page_id = "187308721378592";

		$json_link = "https://graph.facebook.com/v2.6/{$fb_page_id}/posts?fields={$fields}&access_token={$access_token}";

		$json_file = file_get_contents($json_link);

		$obj = json_decode($json_file, true, 512, JSON_BIGINT_AS_STRING);
		//$error = var_dump($obj);
		$album_count = count($obj['data']);

		$news_result = "";
		$alt_text = "Science and Technology Council,IITK shared a photo";
		$error = "";

		for ($i=0; $i < $num_result && $i < $album_count ; $i++) { 

			$id = isset($obj['data'][$i]['id'])? $obj['data'][$i]['id']:"";
			$object_id = isset($obj['data'][$i]['object_id'])? $obj['data'][$i]['object_id']:$id;
			$story = isset($obj['data'][$i]['story'])? $obj['data'][$i]['story']:$alt_text;
			$message = isset($obj['data'][$i]['message'])? $obj['data'][$i]['message']:$story;
			$link = isset($obj['data'][$i]['link'])? $obj['data'][$i]['link']:$story;
			$status_type = isset($obj['data'][$i]['status_type'])? $obj['data'][$i]['status_type']:"";
			$allowed_length = 50;
			if (strlen($message)> $allowed_length){
				$message = substr($message,0,$allowed_length)."...";
			}

			switch ($status_type) {
				case 'added_photos':
					$news_result .= "<li>";
					$news_result .= "<a href = '{$link}'>Photos: {$message}</a>";
					$news_result .= "</li>";
					break;

				case 'shared_story':
					$news_result .= "<li>";
					$news_result .= "<a href = '{$link}'>Story: {$message}</a>";
					$news_result .= "</li>";
					break;

				case 'mobile_status_update':
					$news_result .= "<li>";
					$news_result .= "<a href = '{$link}'>Update: {$message}</a>";
					$news_result .= "</li>";
					break;

				case 'added_video':
					$news_result .= "<li>";
					$news_result .= "<a href = '{$link}'>Video: {$message}</a>";
					$news_result .= "</li>";
					break;

				case 'created_event':
					$file_url = "https://graph.facebook.com/v2.6/{$object_id}?access_token={$access_token}";
					$event_json = file_get_contents($file_url);
					$error = $file_url;
					$event_obj = json_decode($event_json,true,512,JSON_BIGINT_AS_STRING);
					$event_name = $event_obj['name'];
					$event_place = isset($event_obj['place']['name'])?$event_obj['place']['name']:"";
					$news_result .= "<li>";
					$news_result .= "<a href = '{$link}'>Event: {$event_name}, {$event_place}</a>";
					$news_result .= "</li>";
					break;

				case 'wall_post':
					$news_result .= "<li>";
					$news_result .= "<a href = '{$link}'>{$message}</a>";
					$news_result .= "</li>";
					break;

				case 'published_story':
					$news_result .= "<li>";
					$news_result .= "<a href = '{$link}'>{$message}</a>";
					$news_result .= "</li>";
					break;

				
				default:
					# code...
					break;

			}
		}
		return $news_result;	

	}
?>