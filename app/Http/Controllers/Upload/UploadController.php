<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-12-04
 * Time: 17:50
 */

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UploadService;
use Illuminate\Support\Facades\File;
use EllipseSynergie\ApiResponse\Contracts\Response as ApiResponse;

class UploadController extends Controller
{
    /**
     * @var UploadService
     */
    protected $uploadService;

    /**
     * @var ArticleService3
     */
    protected $articleService;

    /**
     * UploadController constructor.
     * @param UploadService $uploadService
     */
    public function __construct(UploadService $uploadService, ApiResponse $apiResponse)
    {
        $this->uploadService = $uploadService;
        $this->apiResponse = $apiResponse;
    }

    public function upload(Request $request)
    {
        $file = $_FILES['editormd-image-file'];

        $fileName = $request->get('file_name');
        $fileName = $fileName ?: $file['name'];

        $content = File::get($file['tmp_name']);


        $path = "images/".date('Ymd');

        $this->uploadService->createDirectory($path);

        $result = $this->uploadService->saveFile($path.'/'.$fileName, $content);

        if ($result === true) {
            return $this->apiResponse->withArray([
                'success' =>  true,
                'message' =>  'success',
                'url' => '/blog/imgage-upload/'.$fileName
            ]);
        }

        return $this->apiResponse->withArray([
           'success' => false,
           'message' => $result ? : "An error occurred uploading file.",
           'url' => ''
        ]);
    }
}