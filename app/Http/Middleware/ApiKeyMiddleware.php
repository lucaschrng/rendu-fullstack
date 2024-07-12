<?php

namespace App\Http\Middleware;

use App\Models\ApiKey;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('x-api-key');
        $apiKeyRecord = ApiKey::where('key', $apiKey)->first();

        if (!$apiKey || !$apiKeyRecord) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $request->user = $apiKeyRecord->user;

        return $next($request);
    }
}
