<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Support\Facades\Auth;

    class Tester {
        /**
         * Handle an incoming request.
         *
         * @param Request $request
         * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
         * @return Response|RedirectResponse
         */
        public function handle(Request $request, Closure $next) {
            if(Auth::user()->Role->name !== 'Staff' && Auth::user()->Role->name !== 'Admin' && Auth::user()->Role->name !== 'Tester') {
                abort(401);
            }
            return $next($request);
        }
    }
