<?php
namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Upload extends Model
{
    /**
     * @var UploadedFile
     */
    const UPLOAD_FILE = 'file';//上传文件
    const UPLOAD_IMAGE = 'image';//上传图片

    public $inputFile;
    public $imageFile;

    public function scenarios()
    {
        return [
            self::UPLOAD_FILE => ['inputFile'],
            self::UPLOAD_IMAGE => ['imageFile'],
        ];
    }

    public function rules()
    {
        return [
            [
                ['inputFile'],
                'file',
                'skipOnEmpty' => false,
                'extensions' => ['xls', 'xlsx', 'csv'],
                'on' => 'file'
            ],
            [
                ['imageFile'],
                'image',
                'skipOnEmpty' => false,
                'extensions' => 'png, jpg, gif, jpeg',
                'on' => 'image'
            ],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
    public function readExcel($filePath){

        $PHPExcel  = new \PHPExcel();
        $PHPReader = new \PHPExcel_Reader_Excel2007();// Reader很关键，用来读excel文件

        if (!$PHPReader->canRead($filePath)) { // 尝试去读文件，07不行用05，05不行就报错。注意，这里的return是Yii框架的方式。
            $PHPReader = new \PHPExcel_Reader_Excel5();
            if (!$PHPReader->canRead($filePath)) {
                $errorMessage = "Can not read file.";
                return $this->render('error', ['errorMessage' => $errorMessage]);
            }
        }
        $PHPExcel = $PHPReader->load($filePath); // Reader读出来后，加载给Excel实例

        $allSheet = $PHPExcel->getSheetCount(); // sheet数
        $currentSheet = $PHPExcel->getSheet(0); // 拿到第一个sheet（工作簿?）    
        $allColumn = $currentSheet->getHighestColumn(); // 最高的列，比如AU. 列从A开始
        $allRow = $currentSheet->getHighestRow(); // 最大的行，比如12980. 行从0开始
        
        $tableData = [];
        for ($currentRow = 1; $currentRow <= $allRow; $currentRow++) {
            echo $currentRow;

            $lineVal = [];
            for ($currentColumn = "A"; $currentColumn <= $allColumn; $currentColumn++) {
                $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65, $currentRow)->getValue(); // ord把字母转为ascii码，A->65, B->66....这儿的坑在于AU->65, 后面的U没有计算进去，所以用索引方式遍历是有缺陷的。
                array_push($lineVal, $val);
            }
            array_push($tableData, $lineVal);
        }

        return $tableData;
    }
}