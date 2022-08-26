<?php

namespace App\Http\Helpers;

class Helper
{
	public static function uploadImage($request)
	{
		if ($request->file('img')) {
			$file  = $request->file('img');
			// $heigt = "";
			// $width = "";
			$fileName = date('YmdHi') . $file->getClientOriginalName();
			$file->move(public_path('public/Image'), $fileName);
			return $fileName;
		}
		return '';
	}
}