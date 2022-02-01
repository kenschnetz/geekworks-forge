<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Auth\Events\Verified;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Support\Facades\Auth;

    class VerifiedIfAuthed {
        /**
         * Handle an incoming request.
         *
         * @param Request $request
         * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
         * @return Response|RedirectResponse
         */
        public function handle(Request $request, Closure $next) {
            if(!empty(Auth::user())) {
                if (empty(Auth::user()->email_verified_at)) {
                    return redirect('verify-email');
                }
            }
            return $next($request);
        }
    }
