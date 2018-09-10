<?php


namespace DanielPfeil\ServiceProviderApacheShib;


use Minimalcode\Optional\AbstractOptional;

final class OptionalSession extends AbstractOptional
{
    /**
     * @param ServiceProvider $value
     * @return bool|void
     * @throws \TypeError
     */
    protected function supports($value): ?OptionalSession
    {
        if ($value instanceof ServiceProvider) {
            return $value->getSessionId();
        }
        throw new \TypeError();
    }
}