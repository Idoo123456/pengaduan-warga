<style>
    /* ================= SIPAWA PAGINATION ================= */
    .sipawa-pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin: 60px 0 40px;
    }

    .sipawa-pagination a,
    .sipawa-pagination span {
        min-width: 44px;
        height: 44px;
        padding: 0 16px;
        border-radius: 999px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        transition: .25s;
    }

    /* Number */
    .page-number {
        background: #ffffff;
        color: #334155;
        border: 1px solid #e5e7eb;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
    }

    .page-number:hover {
        background: #6366f1;
        color: #fff;
        transform: translateY(-2px);
    }

    /* Active */
    .page-number.active {
        background: linear-gradient(135deg, #4f46e5, #6366f1);
        color: #fff;
        border: none;
        box-shadow: 0 12px 30px rgba(79, 70, 229, .45);
    }

    /* Arrows */
    .page-btn {
        background: #ffffff;
        color: #4f46e5;
        border: 1px solid #e5e7eb;
        font-size: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
    }

    .page-btn:hover {
        background: #eef2ff;
    }

    /* Disabled */
    .page-btn.disabled {
        opacity: .4;
        pointer-events: none;
    }

    /* Dots */
    .page-dots {
        color: #94a3b8;
        padding: 0 6px;
    }
</style>
@if ($paginator->hasPages())
    <nav class="sipawa-pagination">
        {{-- PREVIOUS --}}
        @if ($paginator->onFirstPage())
            <span class="page-btn disabled">‹</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="page-btn">‹</a>
        @endif

        {{-- PAGES --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" --}}
            @if (is_string($element))
                <span class="page-dots">{{ $element }}</span>
            @endif

            {{-- Page Numbers --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-number active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="page-number">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- NEXT --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="page-btn">›</a>
        @else
            <span class="page-btn disabled">›</span>
        @endif
    </nav>
@endif
