<?php

namespace Tests\Feature\Expiriment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Js;
use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use Tests\TestCase;

class JsTest extends TestCase
{
    #[DoesNotPerformAssertions]
    public function testFrom(): void
    {
        echo Js::from(['name' => 'ujun', 'age' => 12]);
    }
}
