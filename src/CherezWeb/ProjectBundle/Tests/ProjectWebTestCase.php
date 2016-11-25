<?php

namespace CherezWeb\ProjectBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class ProjectWebTestCase extends WebTestCase
{
    
//    public static function setUpBeforeClass()
//    {
//        
//    }
//    
//    public static function tearDownAfterClass()
//    {
//        
//    }
    
//    public function getData()
//    {
//        return
//            [
//                [
//                    function() {
//                        return [
//                            'key' => self::$client->getKey(),
//                            'command' => 'check_client_state',
//                            'data' => 'test_state'
//                        ];
//                    },
//                    function (ArrayPathAccess $apiResponseData) {
//                        self::getEntityManger()->refresh(self::$client);
//                        $this->assertSame('equal', $apiResponseData->getNodeValue('data'));
//                        $this->assertNotNull(self::$client->getLastConnection());
//                    }
//                ],
//                [
//                    function() {
//                        return [
//                            'key' => self::$client->getKey(),
//                            'command' => 'check_client_state',
//                            'data' => 'test_state_different'
//                        ];
//                    },
//                    function (ArrayPathAccess $apiResponseData) {
//                        self::getEntityManger()->refresh(self::$client);
//                        $this->assertSame('different', $apiResponseData->getNodeValue('data'));
//                    }
//                ],
//            ];
//        }
//    }

    private static $container;

    /**
     * Shortcut to return the Doctrine Registry service.
     *
     * @return \Doctrine\ORM\EntityManager
     *
     * @throws \LogicException If DoctrineBundle is not available
     */
    public static function getEntityManger()
    {
        return self::getContainer()->get('doctrine')->getManager();
    }

    public static function getContainer()
    {
        if (self::$container === null) {
            self::$kernel = self::createKernel();
            self::$kernel->boot();
            self::$container = self::$kernel->getContainer();
        }
        return self::$container;
    }

    /**
     * @return \CherezWeb\ServiceBundle\Entity\User User for tests.
     */
    public static function getUser()
    {
        return self::getEntityManger()
                ->getRepository('CherezWebServiceBundle:User')
                ->findOneBy(['email' => self::getContainer()->getParameter('cherez_web__project__email__support')]);
    }
}
