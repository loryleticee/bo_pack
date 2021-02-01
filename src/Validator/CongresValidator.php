<?php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
* @Annotation
*/
class CongresValidator extends Constraint
{
public $message = 'The string "{{ string }}" contains an illegal character: it can only contain letters or numbers.';
}