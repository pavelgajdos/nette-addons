<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 28.02.15
 * Time: 23:01
 */

namespace PG\UI;


use Nette\Utils\Html;
use Nextras\Forms\Rendering\Bs3FormRenderer;

class Form  extends \Nette\Application\UI\Form {

    public function setBootstrap3Style()
    {
        $renderer = new Bs3FormRenderer();
        $this->setRenderer($renderer);
    }

    const FILE_SELECT_TYPE_ALL = 0;
    const FILE_SELECT_TYPE_IMAGE = 1;

    public function addFileSelect($name, $label = null, $type = self::FILE_SELECT_TYPE_ALL, $subfolder = 'common')
    {
        if ($subfolder !== null) {
            @setcookie('RF_subfolder', $subfolder.'/', time() + (86400 * 30), "/");
        }

        $input =  $this->addText($name, $label);

        $html = Html::el('div')
                    ->addAttributes([
                        'class'=> ($type==self::FILE_SELECT_TYPE_IMAGE)? 'picture-preview' : 'file-preview',
                        'style'=>'margin-top:10px',
                        'data-id'=>$input->getHtmlId()
                    ]);

        $input->setOption("description",$html);
        $input->setAttribute("class", "file-external");
        $input->setAttribute("data-type",$type);
        $input->setAttribute("autocomplete", "off");

        return $input;
    }
} 