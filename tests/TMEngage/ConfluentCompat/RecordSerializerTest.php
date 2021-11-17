<?php

namespace TMEngage\ConfluentCompat;

use FlixTech\AvroSerializer\Objects\RecordSerializer;
use FlixTech\SchemaRegistryApi\Registry\Cache\AvroObjectCacheAdapter;
use FlixTech\SchemaRegistryApi\Registry\CachedRegistry;
use FlixTech\SchemaRegistryApi\Registry\PromisingRegistry;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class RecordSerializerTest extends TestCase
{
    public function testLibraryTestBootStrap() {
        $mock = new MockHandler();
        $client = new Client(['handler' => HandlerStack::create($mock)]);
        $registry = new PromisingRegistry($client);
        $cr = new CachedRegistry($registry, new AvroObjectCacheAdapter());
        $serializer = new RecordSerializer($cr);
        self::assertInstanceOf(RecordSerializer::class, $serializer);
        self::assertNotNull(true);
    }
}
