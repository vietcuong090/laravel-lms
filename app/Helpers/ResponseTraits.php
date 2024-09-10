<?php

namespace App\Helpers;

use Illuminate\Http\Response;

trait ResponseTraits
{
    protected function success($data = [], $code = Response::HTTP_OK, $message = 'Success')
    {
        return response()->json(
            [
                'success' => 1,
                'status'  => true,
                'data'    => $data,
                'error'   => null,
                'code'    => $code,
                'message' => $message
            ],
            $code
        );
    }

    protected function error($message, $code = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        return response()->json(
            [
                'success' => 0,
                'status'  => false,
                'data'    => null,
                'error'   => $message,
                'code'    => $code,
                'message' => $message
            ],
            $code
        );
    }

    protected function notFound($message = 'NOT_FOUND')
    {
        return $this->error($message, Response::HTTP_NOT_FOUND);
    }

    protected function notAuthorize($message = 'UNAUTHORIZED')
    {
        return $this->error($message, Response::HTTP_UNAUTHORIZED);
    }

    protected function errorServer($message = 'INTERNAL_SERVER_ERROR')
    {
        return $this->error($message, Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
