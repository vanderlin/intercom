<?php

namespace InterComm\Http\Requests;

use InterComm\Http\Requests\Request;
use Illuminate\Http\JsonResponse;

class BaseRequest extends Request
{
    // ------------------------------------------------------------------------
    public function authorize()
    {
        return true;
    }

    // ------------------------------------------------------------------------
    public function wantsJson()
    {
        $acceptable = $this->getAcceptableContentTypes();
        return $this->input('json')==true || (isset($acceptable[0]) && $acceptable[0] === 'application/json');
    }
    // ------------------------------------------------------------------------
    public function errorResponse(array $errors)
    {
        if ($this->ajax() || $this->wantsJson()) {
            return new JsonResponse($errors, 422);
        }

        return $this->redirector->to($this->getRedirectUrl())
                                        ->withInput($this->except($this->dontFlash))
                                        ->withErrors($errors, $this->errorBag);
    }

    // ------------------------------------------------------------------------
    public function statusResponse(array $message, $status=200)
    {
        if ($this->ajax() || $this->wantsJson()) {
            return new JsonResponse($message, $status);
        }

        return $this->redirector->to($this->getRedirectUrl())
                                        ->withInput($this->except($this->dontFlash));
    }

    // ------------------------------------------------------------------------
    public function page($view, $data=[])
    {
        if($this->wantsJson()) 
        {
            return new JsonResponse($data, 200);
        }
        return view($view, $data);
    }




    public function rules()
    {
        return [
            //
        ];
    }
}
