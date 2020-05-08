<?php

namespace Spatie\Multitenancy\Tests\Feature\TestClasses;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Valuestore\Valuestore;

class TestJob implements ShouldQueue
{
    use InteractsWithQueue;

    public Valuestore $valuestore;

    public function __construct(Valuestore $valuestore)
    {
        $this->valuestore = $valuestore;
    }

    public function handle()
    {
        $this->valuestore->put('tenantId', Tenant::current()->id);
    }
}