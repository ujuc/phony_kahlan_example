<?php

namespace Example\Dns;

use function Eloquent\Phony\restoreGlobalFunctions;
use function Eloquent\Phony\stubGlobal;
use Psr\SimpleCache\CacheInterface;
use function Eloquent\Phony\Kahlan\mock;

describe('DomainResolver', function () {
    beforeEach(function () {
        $this->cache = mock(CacheInterface::class);
        $this->resolver = new DomainResolver($this->cache->get());

        $this->gethostbyname = stubGlobal('gethostbyname', __NAMESPACE__);
    });

    afterEach(function () {
        restoreGlobalFunctions();
    });

    describe('resolve()', function () {
        context('일치하는 캐시 항목이 있을 경우', function () {
            it('캐시 항목을 반환할 수 있다.', function () {
            });
            it('이름을 다시 확인하려 시도해서는 안된다.', function () {
            });
            it('캐시 항목을 덮어쓰면 안된다.', function () {
            });
        });

        context('일치하는 캐시 항목이 없을 경우', function () {
            it('조회 결과를 반환한다.', function () {
            });
            it('캐시 항목을 만든다.', function () {
            });
        });

        context('도메인 조회에 실패 했을 경우', function () {
            it('예외를 발생한다.', function () {
            });
            it('캐시 항목을 만들어서는 안된다.', function () {
            });
        });

        context('캐시 항목을 만드는데 실패했을 경우', function () {
            it('예외를 발생한다.', function () {
            });
        });
    });
});
