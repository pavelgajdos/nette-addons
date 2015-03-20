<?php
/**
 * @author Pavel Gajdos (info@pavelgajdos.cz)
 * @date 20.03.15
 */

namespace PG\Files;


class File
{
    protected $path;

    public function __construct($path)
    {
        $this->path;
    }

    public function __toString()
    {
        return $this->path;
    }
} 