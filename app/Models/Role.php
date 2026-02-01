<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends SpatieRole
{
    //
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->useLogName('role')
            ->setDescriptionForEvent(fn(string $event) => "Role {$event}");
    }
}
