<?php

declare(strict_types=1);

namespace Repository;

use Config\Setup;

abstract class AbstractRepository
{
    protected $conn;

    public function __construct()
    {
        $this->conn = Setup::database();
    }
}
