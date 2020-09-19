<?php

namespace App;

/**
 * Class AdminDataTable
 * @package App
 */
class AdminDataTable
{

    protected $models;
    protected $functions;

    /**
     * AdminDataTable constructor.
     * @param \Generator $models
     * @param callable[] $functions
     */
    public function __construct($models, $functions)
    {
        $this->models = $models;
        $this->functions = $functions;
    }

    /**
     * @param $template
     * @return string
     */
    public function render($template)
    {
        $view = new View();
        $view->models = $this->models;
        $view->functions = $this->functions;
        return $view->render($template);
    }
}
