<?php


namespace Core\DB\Builers;

use Core\DB\Contracts\IQueryBuilder;

class Query implements IQueryBuilder{
    private string $proplog = 'select ';
    private array $params = [];
    protected array  $columns;
    protected array  $conditions;
    protected string $orderBy;
    protected string $groupBy;
    protected string $join;
    protected string $limit;
    protected string $offset;

    private function __construct()
    {
        
    }

    public static function query() : IQueryBuilder
    {
        return new self();
    } 

    public function where(array|callable $condition) : IQueryBuilder
    {
        return $this;
    } 

    public function orWhere(array|callable $condition) :  IQueryBuilder
    {
        return $this;
    } 

    public function find(mixed $primaryKey) :   IQueryBuilder
    {
        return $this;
    } 

    public function all() :   IQueryBuilder
    {
        return $this;
    }  

    public function get() : array
    {
        return  [];
    }

    public function first() : object|array
    {
        return [];
    } 

    public function join() :   IQueryBuilder
    {
        return $this;
    } 

    public function orderBy() :   IQueryBuilder
    {
        return $this;
    } 

    public function groupBy() :   IQueryBuilder
    {
        return $this;
    } 

    public function when() :   IQueryBuilder
    {
        return $this;
    }  

    public function whereHas() :   IQueryBuilder
    {
        return $this;
    }  
    
    public function select(array $columns) :   IQueryBuilder
    {
        return $this;
    } 

    public function pluck(string $column) : object|array
    {
        return [];
    }

    public function selectRaw(string $sql, array $params):   IQueryBuilder
    {
        return $this;
    } 

    public function update(array $columns) : mixed
    {
        return false;
    }

    public static function create(array $columns) : mixed
    {
        return false;
    }

    public function limit(int $limit) :IQueryBuilder
    {
        return $this;
    } 

    public function offset(int $offset) :IQueryBuilder
    {
        return $this;
    } 

    public function delete(): mixed
    {
        return false;
    }


}