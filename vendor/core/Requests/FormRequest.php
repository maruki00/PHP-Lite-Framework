<?php

namespace Core\Requests;

use Core\Helpers\Json;
use Core\Validation\Validator;

abstract class FormRequest extends Validator
{
    protected array $data = [];
    protected array $validatedData = [];
    protected array $errors   = [];
    
    public function __construct()
    {
          $this->data = Json::decode(file_get_contents('php://input'));
    }
    
    public abstract function validate():bool;
    public abstract function validated():bool;
    public abstract function messages():bool;
    public function only(array $keys):array
    {
        $filtered = array_filter($this->validatedData, function ($key, $item) use ($keys){
            return in_array($key, $keys);
        });
    }
    public function authorized():bool
    {
        return false;
    }
}