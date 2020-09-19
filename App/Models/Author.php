<?php


namespace App\Models;

use App\Model;

/**
 * Class Author
 * @package App\Models
 * @property int $id
 * @property string $name
 */
class Author extends Model
{
    /**
     * @var string
     */
    protected static $table = 'authors';

    /**
     * @var string
     */
    public $name;

}