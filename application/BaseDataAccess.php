<?php

class BaseDataAccess
{
    protected $table;
    protected $primary_key;

    /**
     * find
     * @return array of objects
     */
    public static function find()
    {
        $object = new static;

        $sql = 'select '.$object->getPropertiesString().' '.
            'from '.$object->table.';';

        return $object->fetch($sql, array());
    }

    /**
     * findById
     * @param mixed $id
     * @return object
     */
    public static function findById($id) {
        $object = new static;

        $sql = 'select ' . $object->getPropertiesString() . ' ' .
            'from ' . $object->table . ' ' .
            'where ' . $object->primary_key . ' = ?;';

        return $object->fetchSingle($sql, array($id));
    }

    /**
     * findByProperties
     * @param array $properties
     * @return array of objects
     */
    public static function findByProperties(array $properties) {
        $object = new static;
        $filters = array();
        $values = array();

        $sql = 'select ' . $object->getPropertiesString() . ' ' .
            'from ' . $object->table . ' ' .
            'where ';

        foreach($properties as $key => $value) {
            $filters[] = $key . ' = ?';
            $values[] = $value;
        }

        $sql .= join(' and ', $filters) . ';';

        return $object->fetch($sql, $values);
    }

    /**
     * insert
     * @return bool
     */
    public function insert()
    {
        $properties = $this->getProperties();
        $tokens = array();
        $values = array();

        foreach($properties as $property) {
            $name = $property->name;

            if($name != 'table' && $name != 'primary_key' && $name != 'id') {
                $tokens[] = $name;
                $values[] = '?';
            }
        }

        $sql = 'insert into ' . $this->table . '(' . join(', ', $tokens) . ') '.
            'values(' . join(', ', $values) . ');';

        $db = db::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute($this->bindProperties());
        $this->id = $db->lastInsertId();

        $error = $stmt->errorInfo();
        return ($error[0] === '00000');
    }

    /**
     * update
     * @return bool
     */
    public function update() {
        $properties = $this->getProperties();
        $tokens = array();

        foreach($properties as $property) {
            $name = $property->name;

            if($name != 'table' && $name != 'primary_key' && $name != 'id') {
                $tokens[] = $name.' = ?';
            }
        }

        $sql = 'update ' . $this->table . ' ' .
            'set ' . join(', ', $tokens) . ' ' .
            'where ' . $this->primary_key . ' = ?;';

        $db = db::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute($this->bindProperties(true));

        $error = $stmt->errorInfo();
        return ($error[0] === '00000');
    }

    /**
     * delete
     * @return bool
     */
    public function delete() {
        $sql = 'delete from ' . $this->table . ' ' .
            'where ' . $this->primary_key . ' = ?;';

        $db = db::getInstance();
        $stmt = $db->prepare($sql);
        $properties_array = $this->bindProperties(true);
        $primary_key = array_pop($properties_array);
        $stmt->execute(array($primary_key));

        $error = $stmt->errorInfo();
        return ($error[0] === '00000');
    }

    /**
     * bindProperties
     * @param bool $with_id
     * @return array
     */
    protected function bindProperties($with_id = false)
    {
        $properties = $this->getProperties();
        $primary = null;
        $pairs = array();

        foreach($properties as $property) {
            $name = $property->name;

            if($name != 'table' && $name != 'primary_key') {
                if($name === $this->primary_key) {
                    $primary = $property->getValue($this);
                }
                else {
                    $pairs[] = $property->getValue($this);
                }
            }
        }

        if($with_id) {
            $pairs[] = $primary;
        }

        return $pairs;
    }

    /**
     * getPropertiesString
     * @return string
     */
    protected function getPropertiesString()
    {
        $properties = $this->getProperties();
        $columns = array();

        foreach($properties as $property) {
            $name = $property->name;

            if($name != 'table' && $name != 'primary_key') {
                $columns[] = $name;
            }
        }

        return join(', ', $columns);
    }

    protected function getProperties() {
        $object = new static;
        $reflector = new ReflectionClass($object);
        return $reflector->getProperties();
    }

    /**
     * fetch
     * @param string $sql
     * @param array $params
     * @return array of objects
     */
    protected function fetch($sql, array $params)
    {
        $db = db::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $objects = array();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $objects[] = self::mapProperties($row);
        }

        return $objects;
    }

    /**
     * fetchSingle
     * @param string $sql
     * @param array $params
     * @return object
     */
    protected function fetchSingle($sql, array $params) {
        $db = db::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($result)
            ? self::mapProperties($result)
            : null;
    }

    /**
     * mapProperties
     * @param array $properties
     * @return object
     */
    protected function mapProperties(array $properties)
    {
        $object = new static;

        foreach($properties as $key => $value) {
            $object->$key = $value;
        }

        return $object;
    }
}