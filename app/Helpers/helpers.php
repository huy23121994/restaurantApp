<?php

/*
*   $image : input request file image
*   $directiory : string - directory of storage by root 'storage/app/public/'
*   $crop_width, $crop_height, $crop_x, $crop_y : int
*   => return file of directory or false
*/

function crop_image($image, $directiory, $name, $crop_width, $crop_height, $crop_x, $crop_y){
	$local_storage = 'app/public/' . $directiory;
    if ( !File::exists(storage_path($local_storage) ) ) {
        File::makeDirectory(storage_path($local_storage));
    }

    $filename  = $name . '.' . $image->getClientOriginalExtension();

    $crop_width = number_format($crop_width);
    $crop_height = number_format($crop_height);
    $crop_x = number_format($crop_x);
    $crop_y = number_format($crop_y);

    $img = Image::make($image);
    $img->crop($crop_width, $crop_height, $crop_x, $crop_y);
    $save_result = $img->save( storage_path($local_storage . $filename) );

    if ($save_result) {
    	return Storage::url($directiory . $filename);;
    }
    return false;
}

/*
*   $image : input request file image
*   $directiory : string - directory of storage by root 'storage/app/public/'
*   => return file of directory or false
*/
function save_image($image, $directiory, $name) {
    $filename  = $name . '.' . $image->getClientOriginalExtension();
    $save_result = $image->storeAs('public/'.$directiory, $filename);
    if ($save_result) {
        return Storage::url($directiory . $filename);;
    }
    return false;
}

/*
*   => return current workspace instance
*/
function getWorkspace(){
    if (session()->has('workspace')) {
        return session('workspace');
    }
    return null;
}
function getWorkspaceUrl()
{
    if (session()->has('workspace')) {
        return session('workspace')->url;
    }
    return null;
}

function getWorkspaceAdmin(){
    $key = getWorkspaceUrl().'-admin';
    return session($key);
}