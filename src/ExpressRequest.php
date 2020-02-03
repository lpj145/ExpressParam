<?php
declare(strict_types=1);

namespace ExpressParams;

use ExpressParams\Types\ExpressParams;
use Psr\Http\Message\ServerRequestInterface;

class ExpressRequest
{
    /**
     * @var ExpressParams
     */
    private $expressParams;

    /**
     * In the future maybe can treat a some crud implementations
     * @param ServerRequestInterface $request
     * @param ExpressParams|null $expressParams
     * @return mixed
     */
    public function __invoke(ServerRequestInterface $request, ExpressParams $expressParams = null): ExpressParams
    {
        if (is_null($expressParams)) {
            $expressParams = new ExpressParams();
        }

        $this->expressParams = $expressParams;

        $function = 'express'.$request->getMethod();
        return $this->{$function}($request);
    }

    protected function expressGET(ServerRequestInterface $request)
    {
        $params = $request->getQueryParams();

        matchRun('attributes', $params, [$this, 'translateAttributes']);
    }

    protected function translateAttributes($attributesString)
    {
        if (!is_string($attributesString)) {
            return;
        }

        $attributes = explode(
            ',',
            substr($attributesString, 1, (strlen($attributesString) - 2))
        );

        if (empty($attributes)) {
            return;
        }

        $this->expressParams->setFields($attributes);
    }
}
