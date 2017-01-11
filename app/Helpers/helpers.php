<?php

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