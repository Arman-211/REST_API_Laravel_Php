<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Models\Link;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    /**
     * Store a new shortened link.
     *
     * @param  StoreLinkRequest  $request
     * @return JsonResponse
     */
    public function store(StoreLinkRequest $request): JsonResponse
    {
        $shortenedUrl = Str::random(6); // Generating short URL

        if (!empty($request->original_url)) {
            Link::query()->create([
                'original_url' => $request->original_url,
                'shortened_url' => $shortenedUrl
            ]);
        }

        return response()->json(['shortened_url' => $shortenedUrl], 201);
    }

    /**
     * Redirect to the original URL corresponding to the given shortened link.
     *
     * @param  string  $shortLink
     * @return RedirectResponse
     */
    public function redirect(string $shortLink): RedirectResponse
    {
        $link = Link::query()->where('shortened_url', $shortLink)->first();

        if ($link && $link->original_url) {
            return redirect($link->original_url);
        }

        return abort(404);
    }
}
