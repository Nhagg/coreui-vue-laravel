<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
	/** Mi_Folder Start */
	public function createFolder(Request $request)
	{
		$validatedData = $request->validate([
			'name' => 'required|string'
		]);

		$folderName = $validatedData['name'];

		$result = Storage::disk('media')->makeDirectory($folderName);

		return response()->json([
			'success' => true,
			'data' => $result
		]);
	}

	public function listFolders(Request $request)
	{
		$validatedData = $request->validate([
			'name' => 'string'
		]);

		$parentFolder = isset($validatedData['name']) ? $validatedData['name'] : '';

		$result = [];

		$result['folders'] = Storage::disk('media')->allDirectories($parentFolder);
		$result['files'] = Storage::disk('media')->allFiles($parentFolder);

		return response()->json([
			'success' => true,
			'data' => $result
		]);
	}

	public function fileAdd(Request $request)
	{
		$validatedData = request()->validate([
			'file' => "required",
			'path' => "string|nullable",
			'name' => "string",
			'action' => "string"
		]);
		/**
		 * @var UploadedFile $file
		 */
		$file = $validatedData['file'];

		//check invalid extension
		$originalName = $file->getClientOriginalName();
		$type = $file->getClientMimeType();

		if (!isset($type) || !in_array($type, array("image/png", "image/jpeg", "image/gif"))) {
			return response()->json([
				'success' => false,
				'data' => 'invalid_image_type'
			]);
		}

		$path = isset($validatedData['path']) ? '/' . $validatedData['path'] . '/' : '/';
		$name = isset($validatedData['name']) ? $path . $validatedData['name'] : $path . $originalName;
		$fileName = isset($validatedData['name']) ? $validatedData['name'] : $originalName;
		$action = isset($validatedData['action']) ? $validatedData['action'] : '';

		$fileExist = Storage::disk('media')->exists($name);
		if ($fileExist && $action !== 'override') {
			return response()->json([
				'success' => false,
				'result' => 'file_already_exist'
			]);
		}

		//delete file if exist
		if ($fileExist && $action === 'override') {
			Storage::disk('media')->delete($name);
		}
//		dd($path);
		//move to images folder
		$createdFileName = Storage::disk('media')->put($path . '/', $file);
		//rename
		Storage::disk('media')->move($createdFileName, $name);

		return response()->json([
			'success' => true,
			'data' => [
				'name' => $fileName,
				'path' => $name,
				'url' => '/images' . $name
			]
		]);
	}

	/** Mi_Folder End*/
}
