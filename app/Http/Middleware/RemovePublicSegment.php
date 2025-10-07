<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemovePublicSegment
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $uri = $request->getRequestUri();

        // Check if the URI contains '/public/'
        if (str_contains($uri, '/public/')) {
            // Remove '/public/' from the URI
            $newUri = str_replace('/public/', '/', $uri);

            // Redirect to the new URL with a 301 status (SEO-friendly)
            return redirect()->to($newUri, 301);
        }

        // If no '/public/' in the URI, proceed with the request
        return $next($request);
    }
}
