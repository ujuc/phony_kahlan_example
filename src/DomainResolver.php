<?php

namespace Example\Dns;

use Psr\SimpleCache\CacheInterface;
use RuntimeException;

/**
 * Resolves domain names to IPv4 address.
 */
class DomainResolver
{
    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Resolve a domain name.
     *
     * @param string $name The domain name.
     *
     * @return string   The resolved IPv4 address.
     * @throws RuntimeException IF the domain name could not be resolved.
     */
    public function resolve(string $name): string
    {
        $cached = $this->cache->get($name);

        if ($cached !== null) {
            return $cached; // cache hit
        }

        $address = gethostbyname($name);

        // handle gethostbyname() failure
        if ($address === $name) {
            throw new RuntimeException('Unable to resolve.');
        }

        // handle cache failure
        if (!$this->cache->set($name, $address)) {
            throw new RuntimeException('Unable to cache.');
        }

        return $address;
    }

    private $cache;
}
