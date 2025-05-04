@props(['disabled' => false])

<textarea @disabled($disabled) oninput="autoResize(this)"
    {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm p-3']) }}>{{ $slot }}</textarea>

<script>
    function autoResize(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = textarea.scrollHeight + 'px';
    }

    window.addEventListener('DOMContentLoaded', () => {
        const ta = document.getElementById('content');
        if (ta) autoResize(ta);
    });
</script>
