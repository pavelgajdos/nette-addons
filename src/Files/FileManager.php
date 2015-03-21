<?php
/**
 * @author Pavel Gajdos (info@pavelgajdos.cz)
 * @date 20.03.15
 */

namespace PG\Files;


use Nette\Object;

class FileManager extends Object
{
    /** @var array */
    protected $fileStack;

    /** @var string */
    protected $wwwDir;

    /** @var string */
    protected $directory;

    public function __construct($wwwDir, $directory)
    {
        $this->wwwDir = $wwwDir;
        $this->directory = $directory;
    }

    public function removeFile($path)
    {
        unlink($this->getAbsolutePath($path));
    }

    public function addFileToBeRemoved($id, $path)
    {
        if (isset($this->fileStack[$id]))
            $id .= "_".time();

        $this->fileStack[$id] = $path;
    }

    public function removeStackedFiles()
    {
        foreach ($this->fileStack as $file)
        {
            $this->removeFile($file);
        }
    }

    public function saveFile($file, $path)
    {

    }

    public function getAbsolutePath($path)
    {
        return $this->wwwDir . "/" . $this->getRelativePath($path);
    }

    public function getRelativePath($path)
    {
        $delimiter = "/";

        if ($path[0] == '/')
            $delimiter = "";

        return $this->directory . $delimiter . $path;
    }
} 