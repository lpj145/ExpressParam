<?php

namespace ExpressParams {
    function matchRun(string $key, array $seeds, callable $fun)
    {
        if (array_key_exists($key, $seeds)) {
            $fun($seeds[$key]);
        }
    }
}
