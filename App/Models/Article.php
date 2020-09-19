<?php


namespace App\Models;

use App\Exceptions\ModelValueException;
use App\Model;

/**
 * Class Article
 * @package App\Models
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $author_id
 * @property Author $author
 */
class Article extends Model
{
    /**
     * @var static string
     */
    protected static $table = 'news';
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $content;
    /**
     * @var int
     */
    public $author_id;

    /**
     * @param string $name
     * @param Author $value
     */
    public function __set($name, $value)
    {
        if ('author' === $name && $value instanceof Author) {
            $this->author_id = $value->id;
        }
    }

    /**
     * @param $name
     * @return Author|null
     */
    public function __get($name)
    {
        if ('author' === $name && !empty($this->author_id)) {
            return Author::findById($this->author_id);
        }
        return null;
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return ('author' === $name) ? !empty($this->author_id) : false;
    }

    /**
     * @param $value
     * @return $this
     * @throws AApp\Exceptions\ModelValueException
     */
    public function validateTitle($value)
    {
        if (empty($value)) {
            throw new ModelValueException('The title cannot be empty!');
        } else {
            if (strlen($value) > 100) {
                throw new ModelValueException('Too many chars in the title (more than 100)');
            }
        }
        $this->title = $value;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     * @throws App\Exceptions\ModelValueException
     */
    public function validateContent($value)
    {
        if (!isset($value)) {
            throw new ModelValueException('The content is absent!');
        } elseif (!is_string($value) ) {
            throw new ModelValueException('Thre are no text in the article');
        } else {
            if (strlen($value) < 30) {
                throw new ModelValueException('Too little chars in the content of the article (less than 30)');
            }
            if (strlen($value) > 1000) {
                throw new ModelValueException('Too many chars in the content of the article (more than 1000)');
            }
        }
        $this->content = $value;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     * @throws App\Exceptions\ModelValueException
     */
    public function validateId($value)
    {
        if (empty($value)) {
            throw new ModelValueException('The article\'s id is absent!');
        }
        $this->content = $value;
        return $this;
    }

}