<?php

namespace App;

use App\Models\Article;
use Countable;
use Iterator;

/**
 * Class View
 * @package App
 * @property Article $news
 * @property Article $article
 */
class View
    implements Countable, Iterator
{

    use MagicTrait, IteratorTrait, CountableTrait;


    /**
     * @param $template string path to the template
     */
    public function display($template)
    {
        echo $this->render($template);
    }

    /**
     * @param $template string path to the template
     * @return string
     */
    public function render($template)
    {
        ob_start();
        foreach ($this->data as $prop => $value) {
            $$prop = $value;
        }
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
