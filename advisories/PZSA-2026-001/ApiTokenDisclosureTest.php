<?php

/*
 * Regression tests for H1: users.api_token must never be serialised.
 * Drop into tests/Feature of a TypiCMS application (or vendor/typicms/core/tests/Feature).
 * Expected: all three tests fail on typicms/core 17.0.45 and pass with patch 0001.
 */

use TypiCMS\Modules\Core\Models\User;

describe('api_token disclosure (H1)', function (): void {
    test('GET /api/users without a fields parameter does not expose api tokens', function (): void {
        $reader = User::factory()->create();
        $reader->givePermissionTo('read users');
        $superuser = User::factory()->create(['superuser' => true]);

        $response = $this->withToken($reader->api_token)->getJson('/api/users?per_page=100');

        $response->assertOk();
        expect($response->getContent())->not->toContain((string) $superuser->api_token);
        expect(collect($response->json('data'))->pluck('api_token')->filter()->all())->toBeEmpty();
    });

    test('GET /api/history does not expose the api token snapshotted on user creation', function (): void {
        $auditor = User::factory()->create();
        $auditor->givePermissionTo('see history');
        $created = User::factory()->create(['superuser' => true]); // Historable stores toArray() in history.new

        $response = $this->withToken($auditor->api_token)->getJson('/api/history?per_page=200');

        $response->assertOk();
        expect($response->getContent())->not->toContain((string) $created->api_token);
    });

    test('a User model never serialises its api token', function (): void {
        $user = User::factory()->create();

        expect($user->toArray())->not->toHaveKey('api_token');
        expect($user->toJson())->not->toContain((string) $user->api_token);
    });
});
