<?php

use FastD\Model\Migration;
use Phinx\Db\Table;

class Tags extends Migration
{
    /**
     * @return Table
     */
    public function setUp()
    {
        return $this
            ->table('tags')
            ->addColumn('title', 'string', ['limit' => 100])
            ->addColumn('slug', 'string', ['limit' => 100])
            ->addColumn('description', 'string', ['limit' => 100])
            ->addColumn('parent_id', 'integer')
            ->addColumn('created', 'datetime')
            ->addColumn('updated', 'datetime')
            ;
    }

    /**
     * The table preinstall dataset.
     *
     * @return mixed
     */
    public function dataSet(Table $table)
    {

    }
}