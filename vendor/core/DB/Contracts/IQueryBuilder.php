<?php


namespace Core\DB\Contracts;


interface IQueryBuilder{
    public static function query() : IQueryBuilder; 
    public static function where(array|callable $condition) : IQueryBuilder; 
    public static function orWhere(array|callable $condition) : IQueryBuilder; 
    public static function find(mixed $primaryKey) : IQueryBuilder; 
    public static function all() : IQueryBuilder; 
    public static function get() : array; 
    public static function first() : object|array; 
    public static function join() : IQueryBuilder; 
    public static function orderBy() : IQueryBuilder; 
    public static function groupBy() : IQueryBuilder; 
    public static function when() : IQueryBuilder; 
    public static function whereHas() : IQueryBuilder; 
    public static function select(array $columns) : IQueryBuilder; 
    public static function pluck(string $column) : object|array; 
}