<?php

/*
 * This file is part of Composer.
 *
 * (c) Nils Adermann <naderman@naderman.de>
 *     Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Composer\Repository;

use Composer\Repository\FilesystemRepository;
use Composer\Package\MemoryPackage;

class FilesystemRepositoryTest extends \PHPUnit_Framework_TestCase
{
    public function testRepositoryRead()
    {
        $json = $this->createJsonFileMock();

        $repository = new FilesystemRepository($json);

        $json
            ->expects($this->once())
            ->method('read')
            ->will($this->returnValue(array(
                array('name' => 'package1', 'version' => '1.0.0-beta', 'type' => 'vendor')
            )));

        $packages = $repository->getPackages();

        $this->assertSame(1, count($packages));
        $this->assertSame('package1', $packages[0]->getName());
        $this->assertSame('1.0.0.0-beta', $packages[0]->getVersion());
        $this->assertSame('vendor', $packages[0]->getType());
    }

    public function testRepositoryWrite()
    {
        $json = $this->createJsonFileMock();

        $repository = new FilesystemRepository($json);

        $json
            ->expects($this->once())
            ->method('read')
            ->will($this->returnValue(array()));
        $json
            ->expects($this->once())
            ->method('write')
            ->with(array(
                array('name' => 'mypkg', 'type' => 'library', 'names' => array('mypkg'), 'version' => '0.1.10')
            ));

        $repository->addPackage(new MemoryPackage('mypkg', '0.1.10'));
        $repository->write();
    }

    private function createJsonFileMock()
    {
        return $this->getMockBuilder('Composer\Json\JsonFile')
            ->disableOriginalConstructor()
            ->getMock();
    }
}
