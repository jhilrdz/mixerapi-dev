<?php

namespace MixerApi\HalView\Test\TestCase;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class ControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * @var string[]
     */
    public $fixtures = [
        'plugin.MixerApi/HalView.Actors',
        'plugin.MixerApi/HalView.FilmActors',
        'plugin.MixerApi/HalView.Films',
    ];

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        static::setAppNamespace('MixerApi\HalView\Test\App');
    }

    public function test_index(): void
    {
        $this->get('/actors.haljson');
        $body = (string)$this->_response->getBody();
        $object = json_decode($body);

        $this->assertResponseOk();
        $this->assertTrue(isset($object->_links->self->href));
        $this->assertNotEmpty($object->_embedded);
    }
}
