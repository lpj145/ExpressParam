<?php
namespace ExpressParams;

use ExpressParams\Types\ExpressParams;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

class ExpressRequestTest extends TestCase
{
    /**
     * @var ExpressParams
     */
    private $expressParams;
    /**
     * @var ServerRequestInterface
     */
    private $request;

    protected function setUp(): void
    {
        $this->expressParams = new ExpressParams();
        $this->request = $this->createMock(ServerRequestInterface::class);
    }

    public function testMockSuccessfully()
    {
        $this->assertTrue($this->request instanceof ServerRequestInterface);
    }

    public function testNoAttributesWhenWrongString()
    {
//        $this->assertCount(0, (new ExpressRequest($this->request)))
    }
}
