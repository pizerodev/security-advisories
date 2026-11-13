<?php

/*
 * Regression test for H2: a page title must not be able to terminate the
 * <script type="application/ld+json"> block. Expected: fails on typicms/core 17.0.45,
 * passes with patch 0002.
 */

use TypiCMS\Modules\Core\Models\Page;

beforeEach(function (): void {
    $this->obLevel = ob_get_level();
});

afterEach(function (): void {
    while (ob_get_level() > $this->obLevel) {
        ob_end_clean();
    }
});

test('page title cannot break out of the JSON-LD script block (H2)', function (): void {
    $page = Page::query()
        ->published()
        ->whereNotNull('slug->en')
        ->where('redirect', false)
        ->where('is_home', false)
        ->whereNull('module')
        ->first();
    $this->assertNotNull($page, 'No published non-home page with English slug found');

    $marker = 'window.__typicms_xss=1';
    $page->setTranslation('title', 'en', 'Harmless </script><script>'.$marker.'</script>');
    $page->save();

    $response = $this->get($page->url('en'));
    $response->assertOk();
    $html = $response->getContent();

    // Escaped output (&lt;script&gt; in <h1>/<title>, \u003Cscript\u003E in JSON) is fine;
    // a literal <script> element containing the marker means the payload executes.
    expect($html)->not->toContain('<script>'.$marker.'</script>');
    expect($html)->not->toMatch('#<script type="application/ld\+json">\s*\{[^<]*</script><script>#s');
});
