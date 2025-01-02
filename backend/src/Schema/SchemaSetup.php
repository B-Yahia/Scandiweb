<?php

declare(strict_types=1);

namespace Schema;

use GraphQL\Type\Schema;
use GraphQL\Type\SchemaConfig;
use Types\MutationType;
use Types\QueryType;

class SchemaSetup
{
    public static function getSchema()
    {
        return new Schema(
            (new SchemaConfig())
                ->setQuery(new QueryType())
                ->setMutation(new MutationType())
        );
    }
}
