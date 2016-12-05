<?php

namespace PG\LeanMapper\Filters;

use LeanMapper\Connection;
use LeanMapper\Fluent;
use LeanMapper\IMapper;
use LeanMapper\Reflection\Property;
use Joseki\LeanMapper\BaseEntity;

class Filter
{
    /** @var IMapper */
    protected $mapper;

    public function __construct(IMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public static function register(Filter $instance, Connection $connection)
    {
        $connection->registerFilter("orderBy", array($instance, "orderBy"),"ep");
        $connection->registerFilter("orderByDesc", array($instance, "orderByDesc"),"ep");
    }

    public function orderBy(Fluent $statement, BaseEntity $entity, Property $property)
    {
        $orderByProperty = @func_get_arg(3);
        list($orderByProperty, $orderByColumn) = explode(":", $orderByProperty);
        if (!$orderByColumn) {
            $targetEntity = $this->mapper->getEntityClass($property->getRelationship()->getTargetTable());
            $reflection = $targetEntity::getReflection();
            $orderByColumn = $reflection->getEntityProperty($orderByProperty)->getColumn();
        }
        $statement->orderBy($orderByColumn);
    }

    public function orderByDesc(Fluent $statement, BaseEntity $entity, Property $property)
    {
        $orderByProperty = @func_get_arg(3);
        list($orderByProperty, $orderByColumn) = explode(":", $orderByProperty);
        if (!$orderByColumn) {
            $targetEntity = $this->mapper->getEntityClass($property->getRelationship()->getTargetTable());
            $reflection = $targetEntity::getReflection();
            $orderByColumn = $reflection->getEntityProperty($orderByProperty)->getColumn();
        }
        $statement->orderBy($orderByColumn." DESC");
    }
}