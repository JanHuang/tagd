<?php

namespace Model;


use FastD\Http\HttpException;
use FastD\Model\Model;

class TagsModel extends Model
{
    const TABLE = 'tags';
    const LIMIT = '15';

    public function select($page = 1)
    {
        $offset = ($page - 1) * static::LIMIT;
        return $this->db->select(static::TABLE, '*', [
            'LIMIT' => [$offset, static::LIMIT]
        ]);
    }

    public function find($id)
    {
        $result = $this->db->get(static::TABLE, '*', [
            'OR' => [
                'id' => $id,
            ]
        ]);

        if (false === $result) {
            throw new HttpException(sprintf('Tag %s cannot found', $id), 404);
        }

        return $result;
    }

    public function patch($id, array $data)
    {
        $affected = $this->db->update(static::TABLE, $data, [
            'OR' => [
                'id' => $id,
            ]
        ]);

        return $this->find($id);
    }

    public function create(array $data)
    {
        $this->db->insert(static::TABLE, $data);

        return $this->find($this->db->id());
    }

    public function delete($id)
    {
        return $this->db->delete(static::TABLE, [
            'id' => $id
        ]);
    }
}