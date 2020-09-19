<?php


namespace App;

use App\Exceptions\ModelValueException;
use App\Exceptions\MultiException;

/**
 * Class Model
 * @package App
 */
abstract class Model
{
    /**
     * @var string
     */
    protected static $table = '';

    /**
     * @var int
     */
    public $id;

    /**
     * @return array
     */
    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->queryEach($sql, [], static::class);
    }

    /**
     * @param int $id
     * @return bool|static
     */
    public static function findById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
        $params = [':id' => $id];
        $res = $db->query($sql, $params, static::class);
        return $res ? $res[0] : false;
    }

    /**
     * @param int|null $limit
     * @return array
     */
    public static function findLast(int $limit = null)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $limit;
        $res = $db->queryEach($sql, [], static::class);
        return $res ?: false;
    }

    /**
     * @return bool
     * Selects which this class's method to apply: insert() or update()
     */
    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }

    }

    /**
     * Udates data in in a row of a table
     * @return bool
     */
    public function update()
    {
        $db = new Db();
        $props = get_object_vars($this);
        $cols = [];
        $data = [];
        foreach ($props as $name => $value) {
            $data[':' . $name] = $value;
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name . ' = :' . $name;
        }
        $sql = '
            UPDATE ' . static::$table . ' 
            SET ' . implode(', ', $cols) . ' 
            WHERE id = :id
            ';
        $db->execute($sql, $data);
    }

    /**
     * Inserts data into a table
     * @return bool
     */
    public function insert()
    {
        $db = new Db();
        $props = get_object_vars($this);
        $fields = [];
        $binds = [];
        $data = [];
        foreach ($props as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $fields[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $value;
        }
        $sql = '
            INSERT INTO ' . static::$table .
            ' (' . implode(', ', $fields) . ')
            VALUES
             (' . implode(', ', $binds) . ')
             ';
        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    /**
     * @return bool
     * Deletes chosen object by its id
     */
    public function delete()
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id = :id';
        $data = [':id' => $this->id];
        $db->execute($sql, $data);
    }

    /**
     * Fills the form fields
     * @param array $data
     * @throws MultiException
     */
    public function fill(array $data)
    {
        if (empty($data)) {
            return;
        }
        $errors = new MultiException();
        foreach ($data as $key => $value) {
            try {
                $method = 'validate' . ucfirst($key);
                $this->$method($value);
            } catch (ModelValueException $e) {
                $errors->add($e);
            }
        }
        if (!$errors->empty()) {
            throw $errors;
        }
    }
}