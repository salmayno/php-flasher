<?php

namespace Flasher\Toastr\Laravel\Tests;

class NotifyToastrServiceProviderTest extends TestCase
{
    public function testContainerContainNotifyServices()
    {
        $this->assertTrue($this->app->bound('flasher.factory'));
        $this->assertTrue($this->app->bound('flasher.factory.toastr'));
    }

    public function testNotifyFactoryIsAddedToExtensionsArray()
    {
        $manager = $this->app->make('flasher.factory');

        $reflection = new \ReflectionClass($manager);
        $property = $reflection->getProperty('drivers');
        $property->setAccessible(true);

        $extensions = $property->getValue($manager);

        $this->assertCount(1, $extensions);
        $this->assertInstanceOf('Flasher\Prime\FlasherInterface', $extensions['toastr']);
    }

    public function testConfigToastrInjectedInGlobalNotifyConfig()
    {
        $manager = $this->app->make('flasher.factory');

        $reflection = new \ReflectionClass($manager);
        $property = $reflection->getProperty('config');
        $property->setAccessible(true);

        $config = $property->getValue($manager);

        $this->assertArrayHasKey('toastr', $config->get('adapters'));

        $this->assertEquals(array(
            'toastr' => array('scripts' => array('jquery.js'), 'styles' => array('styles.css'), 'options' => array()),
        ), $config->get('adapters'));
    }
}