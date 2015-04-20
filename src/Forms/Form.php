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

/**
 * @method addFileSelect(string $name, string $label = null, int $type = 0, string $subfolder = null)
 */
class Form  extends \Nette\Application\UI\Form {

    public function setBootstrap3Style()
    {
        $renderer = new Bs3FormRenderer();
        $this->setRenderer($renderer);
    }
} 