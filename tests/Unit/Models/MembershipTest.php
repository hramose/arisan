<?php

namespace Tests\Unit\Models;

use App\User;
use App\Group;
use App\Membership;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MembershipTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_membersip_has_belongs_to_user_relation()
    {
        $group = factory(Group::class)->create();
        $newMember = $this->createUser();
        $group->addMember($newMember);

        $membership = Membership::first();

        $this->assertInstanceOf(User::class, $membership->user);
        $this->assertEquals($newMember->id, $membership->user->id);
    }
}
