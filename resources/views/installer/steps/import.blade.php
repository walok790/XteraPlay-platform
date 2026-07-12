@extends('installer.layout', ['csrfNeeded' => true])
@section('title', 'Import')

@section('content')
<div x-data="installer()" x-init="run()">
    <h1 class="text-xl sm:text-2xl font-bold text-slate-900 mb-2">Installing XteraPlay</h1>
    <p class="text-sm text-slate-600 mb-6">
        @if($mode === 'demo')
            Running migrations and loading demo data. This takes about 10 seconds.
        @else
            Running migrations and setting up your business account. This takes about 10 seconds.
        @endif
    </p>

    <!-- Progress -->
    <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 sm:p-6 mb-4">
        <div class="flex items-center gap-4">
            <div class="flex-shrink-0">
                <template x-if="state === 'running'">
                    <svg class="w-10 h-10 text-blue-600 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.37 0 0 5.37 0 12h4z"></path>
                    </svg>
                </template>
                <template x-if="state === 'done'">
                    <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>
                    </div>
                </template>
                <template x-if="state === 'error'">
                    <div class="w-10 h-10 rounded-full bg-red-500 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.29 4.29a1 1 0 011.42 0L10 8.59l4.29-4.3a1 1 0 111.42 1.42L11.41 10l4.3 4.29a1 1 0 01-1.42 1.42L10 11.41l-4.29 4.3a1 1 0 01-1.42-1.42L8.59 10 4.29 5.71a1 1 0 010-1.42z" clip-rule="evenodd"/></svg>
                    </div>
                </template>
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-sm font-semibold text-slate-900" x-text="statusText"></p>
                <p class="text-xs text-slate-500 mt-0.5" x-text="detailText"></p>
            </div>
        </div>

        <div class="mt-4 h-1.5 bg-slate-200 rounded-full overflow-hidden">
            <div class="h-full transition-all duration-500 rounded-full"
                 :class="state === 'error' ? 'bg-red-500' : (state === 'done' ? 'bg-emerald-500' : 'bg-blue-600')"
                 :style="'width: ' + progress + '%'"></div>
        </div>
    </div>

    <!-- Error box -->
    <template x-if="state === 'error'">
        <div class="p-3 bg-red-50 border border-red-200 rounded-lg text-sm text-red-700 mb-4">
            <p class="font-medium mb-1">Installation failed</p>
            <p class="text-xs font-mono whitespace-pre-wrap" x-text="errorMessage"></p>
        </div>
    </template>

    <div class="flex justify-between items-center">
        <template x-if="state === 'error'">
            <a href="{{ url('/install/database') }}" class="text-sm text-slate-600 hover:text-slate-900 inline-flex items-center gap-1">← Back to Database</a>
        </template>
        <template x-if="state !== 'error'">
            <span></span>
        </template>
        <template x-if="state === 'error'">
            <button @click="run()" class="inline-flex items-center gap-1.5 px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-lg transition shadow-sm">
                Retry
            </button>
        </template>
    </div>
</div>

<script>
function installer() {
    return {
        state: 'idle',
        progress: 0,
        statusText: 'Preparing installation...',
        detailText: 'Please wait',
        errorMessage: '',
        async run() {
            this.state = 'running';
            this.progress = 15;
            this.statusText = 'Running database migrations...';
            this.detailText = 'Creating tables in your database';

            // Small animation delay before firing the request
            await new Promise(r => setTimeout(r, 400));
            this.progress = 40;

            try {
                const res = await fetch('{{ url('/install/import/run') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });

                this.progress = 80;
                this.statusText = 'Finalising...';
                this.detailText = 'Almost done';

                const data = await res.json();

                if (data.success) {
                    this.state = 'done';
                    this.progress = 100;
                    this.statusText = 'Installation complete!';
                    this.detailText = 'Redirecting to your site...';
                    await new Promise(r => setTimeout(r, 1200));
                    window.location.href = data.redirect;
                } else {
                    throw new Error(data.error || 'Unknown error');
                }
            } catch (err) {
                this.state = 'error';
                this.progress = 100;
                this.statusText = 'Installation failed';
                this.detailText = 'See error below';
                this.errorMessage = err.message;
            }
        }
    };
}
</script>
@endsection
