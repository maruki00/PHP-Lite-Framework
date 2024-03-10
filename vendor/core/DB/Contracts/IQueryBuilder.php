<?php


namespace Core\DB\Contracts;


interface IQueryBuilder{
    public static function query() : IQueryBuilder; 
    public function where(array|callable $condition) : IQueryBuilder; 
    public function orWhere(array|callable $condition) : IQueryBuilder; 
    public function find(mixed $primaryKey) : IQueryBuilder; 
    public function all() : IQueryBuilder; 
    public function get() : array; 
    public function first() : object|array; 
    public function join() : IQueryBuilder; 
    public function orderBy() : IQueryBuilder; 
    public function groupBy() : IQueryBuilder; 
    public function when() : IQueryBuilder; 
    public function whereHas() : IQueryBuilder; 
    public function select(array $columns) : IQueryBuilder; 
    public function pluck(string $column) : object|array; 
    public function selectRaw(string $sql, array $params): IQueryBuilder;
    public function update(array $columns) : mixed;
    public static function create(array $columns) : mixed;
}