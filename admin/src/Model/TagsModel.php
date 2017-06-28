<?php

namespace Admin\Model;


use FastD\Http\HttpException;
use FastD\Model\Model;

class TagsModel extends Model
{
    const TABLE = 'tags';

    public function select($page = 1, $limit = 15)
    {
        if ($limit <= 5) {
            $limit = 5;
        } else if ($limit >= 25) {
            $limit = 25;
        }

        $offset = ($page - 1) * $limit;
        $data = $this->db->select(static::TABLE, '*', [
            'LIMIT' => [$offset, $limit]
        ]);

        return [
            'data' => $data,
            'offset' => $offset,
            'limit' => $limit,
            'total' => $this->db->count(static::TABLE)
        ];
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