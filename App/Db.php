<?php

namespace App;

use App\Exceptions\DbException;
use Generator;
use PDO;
use PDOException;

/**
 * Class Db
 * @package App
 */
class Db
{
    protected $dbh;

    /**
     * Db constructor.
     */
    public function __construct()
    {
        $config = Config::instance();
        try {
            $dsn = $config->data['db']['driver'] . ':host=' .
                $config->data['db']['host'] . ';dbname=' .
                $config->data['db']['dbname'];
            $this->dbh = new PDO($dsn, $config->data['db']['username'],
                $config->data['db']['password']);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new DbException('No database connection: ' . $e->getMessage());
        }

    }

    /**
     * @param string $sql
     * @param array $params
     * @param string|null $class
     * @return array
     * @throws DbException
     */
    public function query(string $sql, array $params = [], string $class = null)
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $sth->execute($params);
            if (null === $class) {
                return $sth->fetchAll(PDO::FETCH_ASSOC);
            }
            return $sth->fetchAll(PDO::FETCH_CLASS, $class);
        } catch (PDOException $e) {
            throw new DbException('Query Exception ' . $e->getMessage());
        }

    }

    /**
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function execute(string $sql, array $params = [])
    {
        try {
            return $this->dbh->prepare($sql)->execute($params);
        } catch (PDOException $e) {
            throw new PDOException('Execute Exception  ' . $e->getMessage());
        }

    }

    /**
     * @return string
     */
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    /**
     * @param string $sql
     * @param array $params
     * @param string|null $class
     * @return Generator
     * @throws DbException
     */
    public function queryEach(string $sql, array $params = [], string $class = null)
    {
        try {
            $sth = $this->dbh->prepare($sql);
        } catch (PDOException $e) {
            throw new DbException('Error while preparing the request: ' . $e->getMessage());
        }
        try {
            $sth->execute($params);
        } catch (PDOException $e) {
            throw new DbException('Error executing the request: ' . $e->getMessage());
        }
        if (null === $class) {
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            while (false !== ($row = $sth->fetch())) {
                yield $row;
            }
        }
        $sth->setFetchMode(PDO::FETCH_CLASS, $class);
        while (false !== ($row = $sth->fetch())) {
            yield $row;
        }
    }
}