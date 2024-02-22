<?php

namespace Core\Validation;
use Core\Exceptions\MainException;
abstract class Validator
{
    private array $errors = [];
    private array $safeData = [];

    public function __construct(
        private readonly array $data,
        private readonly array $validations
    ){}

    public final function validate(): Validator
    {
        foreach($this->validations as $key => $validations){
            $isValid = 0;
            foreach ($validations as $validate) {
                $isValid += $this->{$validate}($key);
            }
            if($isValid >= count($validations)){
                $this->safeData[$key] = $this->data[$key];
            }else{
                $this->errors[$key] = "Invalid Data or Missing.";
            }
        }
        if(!empty($this->errors)){
            throw new MainException(json_decode($this->errors), 500);
        }
        return $this;
    }

    public final function required(mixed $value): bool
    {
        return !empty($this->data[$value]) ;
    }

    public final function string(mixed $value):bool
	{
        return is_string($this->data[$value]);
    }

    public final function integer(mixed $value): bool
    {
        return is_integer((int)$this->data[$value]);
    }

    public final function email(mixed $value): bool
    {
        return filter_var($this->data[$value], FILTER_VALIDATE_EMAIL);
    }

    public final function sometimes(mixed $value): bool
    {
        return isset($this->data[$value]) || empty($this->data[$value]);
    }
    public final function failed():bool
    {
        return !empty($this->errors);
    }

    public final function errors():array
    {
        return $this->errors;
    }

    public final function safeData():array
    {
        return $this->safeData ?? [];
    }
}
