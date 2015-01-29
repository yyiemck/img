<?php

class PictureUploadController extends BaseController {

	public function upload() {
		if(Input::hasFile('image_up')) {
			$image = Input::file('image_up');
			$destPath = '../public/images';
			$rules = array(
				'image_up' => 'image|max:20000'
	  		);
	    		$messages = array(
	       		'image'=>'이미지 파일만 업로드 할 수 있습니다.',
	       	     'max'=>'이미지 크기가 너무 큽니다.'
	    		);
			$validation = Validator::make(Input::all(), $rules, $messages);
			
			if ($validation->fails()) {
		        return Redirect::to('/')->withErrors($validation)->withInput();
		     } 
		     else {
		     	$dbCursor = new Images;
		     	$title = $image->getClientOriginalName();
		     	$url = time()."-".$title;
		     	$size = $image->getSize();
		     	list($w, $h) = getImagesize(Input::file('image_up'));
		     	$uploadSucess = $image->move($destPath, $url);
		     	chmod($destPath."/".$url, 0664);
		     	$dbCursor->title = $title;
		     	$dbCursor->size = $w."," .$h;
		     	$dbCursor->url = $url;
		     	$dbCursor->save();

		     	return Redirect::To('/');	 
		     }
		}
		else {
			echo "<script>";
			echo "alert('사진이 없습니다.')";
			echo "</script>";
		}     
	}
}