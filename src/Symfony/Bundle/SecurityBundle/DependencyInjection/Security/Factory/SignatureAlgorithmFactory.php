<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory;

use Jose\Component\Core\Algorithm as AlgorithmInterface;
use Symfony\Component\DependencyInjection\ServiceLocator;
use Symfony\Component\Security\Http\AccessToken\Oidc\OidcTokenHandler;

/**
 * Creates a signature algorithm for {@see OidcTokenHandler}.
 *
 * @internal
 *
 * @experimental
 */
final class SignatureAlgorithmFactory
{
    /**
     * @throws \Exception
     */
    public static function create(string $algorithm, ServiceLocator $serviceLocator): AlgorithmInterface
    {
        if(!$serviceLocator->has($algorithm)){
            throw new \Exception(sprintf('Service for algorithm `%s` is missing, use `oidc_token.algorithm` tag in order to add one', $algorithm));
        }

        return $serviceLocator->get($algorithm);
    }
}
