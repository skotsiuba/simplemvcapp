<?php


namespace App\Models;

use App\Model;

/**
 * Class User
 * @package App\Models
 * @property int $id
 * @property string $email
 * @property string $password
 */
class User extends Model
{
    /**
     * @var string
     */
    protected static $table = 'users';

    /**
     * @var sting
     */
    public $email;
    /**
     * @var sting
     */
    public $password;

}