<?php

class Images extends Eloquent {
	protected $table = "imagesTable";
	protected $appends = array('url');
}