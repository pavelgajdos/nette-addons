<?php

namespace PG\Control;

use \Nette\Application\UI\Control;
use Nette\Http\Request;
use Nette\Localization\ITranslator;


abstract class BaseControl extends Control
{
	const SHOW_FLASHES_LOCALLY = 1;
	
	protected $layoutPath; // set to __DIR__ in each subclass if you want to use current directory
	protected $templateFilename = "template.latte";


    /** @var ITranslator */
	protected $translator;

    /** @var Request */
    protected $httpRequest;

	public function setTranslator(ITranslator $translator)
	{
		$this->translator = $translator;
	}

    public function setHttpRequest(Request $request)
    {
        $this->httpRequest = $request;
    }

	public function setTemplateFilename($filename)
	{
		$this->templateFilename = $filename;
	}

	public function createTemplate($class=NULL)
	{
		$template = parent::createTemplate($class);

		$template->setFile($this->layoutPath . "/" . $this->templateFilename);

		$template->setTranslator($this->translator);

		return $template;
	}	

	public function render()
	{
		$this->template->dateFormat = "%d. %m. %Y";
		$this->template->datetimeFormat = $this->template->dateFormat . " %H:%M";
		
		$this->template->render();
	}

	public function translate($text,$count=NULL,$args=NULL)
	{
		if ($this->translator == NULL)
			return $text;

		return $this->translator->translate($text,$count,$args);
	}

	public function flashMessage($message, $type = 'info', $showLocally = FALSE)
	{
		if ($showLocally == self::SHOW_FLASHES_LOCALLY) {
			parent::flashMessage($message, $type);
		}
		else {
			$this->presenter->flashMessage($message, NULL, NULL, $type);
		}
	}
}