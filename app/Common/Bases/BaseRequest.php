<?php


namespace App\Common\Bases;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BaseRequest
 * @package App\Common\Bases
 */
abstract class BaseRequest extends FormRequest
{

    /**
     * @return array
     */
    abstract protected function rules(): array;

    /**
     * @param string $glue
     * @param array $list
     * @return string
     */
    public function implode(array $list = [], string $glue = ',')
    {
        return implode($glue, $list);
    }
}
