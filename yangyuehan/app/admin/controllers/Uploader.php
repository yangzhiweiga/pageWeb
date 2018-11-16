<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/8/25
 * Time: 17:19
 */

namespace app\admin\controllers;


use Cross\Core\Helper;
use Cross\MVC\Controller;
use lib\Images\UploadImages;

/**
 * 上传图片
 *
 * Class Uploader
 * @package app\admin\controllers
 */
class Uploader extends Controller
{
    private $path;
    private $file_name;
    private $ext;

    /**
     * @throws \Cross\Exception\CoreException
     */
    function uploaderImage()
    {
        try {
            if (empty($_FILES['file'])) {
                throw new \Exception("空文件");
            }
            $this->path = Helper::getPath(TIME, 'static/ad');
            $this->ext = Helper::getExt($_FILES['file']['name']);
            $this->file_name = Helper::random(10);
            $UploadImage = new UploadImages('file', $this->file_name);
            $UploadImage->setSavePath($this->path)->save();
            $this->dieJson($this->result(1, ['url'=>$this->getImagePath().$this->file_name.'.'.$this->ext]));
        } catch (\Exception $e) {
            $this->dieJson($this->result(0, $e->getMessage()));
        }

    }

    /**
     * 输出JSON格式消息并终止执行
     *
     * @param array $data
     */
    protected function dieJson($data)
    {
        $this->response->setContentType('json')->displayOver(json_encode($data));
        exit(0);
    }

    private function getImagePath()
    {
        $start = (strpos($this->path, '/ad'))!== false ? strpos($this->path, '/ad') : 0;
        return substr($this->path,$start);
    }
}