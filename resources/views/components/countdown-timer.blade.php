@props(['id' => 'countdown', 'style' => 'hero'])

@php
    $isHero = $style === 'hero';
@endphp

<div id="{{ $id }}" class="{{ $isHero ? 'cd-hero' : 'cd-normal' }}">
    <div class="cd-wrapper">
        
        <div class="cd-item">
            <div class="cd-number" id="{{ $id }}-days">00</div>
            <div class="cd-label">Days</div>
        </div>

        <div class="cd-separator">:</div>

        <div class="cd-item">
            <div class="cd-number" id="{{ $id }}-hours">00</div>
            <div class="cd-label">Hours</div>
        </div>

        <div class="cd-separator">:</div>

        <div class="cd-item">
            <div class="cd-number" id="{{ $id }}-minutes">00</div>
            <div class="cd-label">Minutes</div>
        </div>

        <div class="cd-separator">:</div>

        <div class="cd-item">
            <div class="cd-number" id="{{ $id }}-seconds">00</div>
            <div class="cd-label">Seconds</div>
        </div>

    </div>
</div>

@if(!$isHero)
<script>
document.addEventListener('DOMContentLoaded', function() {
    const weddingDate = new Date('October 15, 2024 15:00:00').getTime();
    
    function updateCountdown() {
        const now = new Date().getTime();
        const timeRemaining = weddingDate - now;
        
        if (timeRemaining < 0) {
            updateElement('{{ $id }}-days', '00');
            updateElement('{{ $id }}-hours', '00');
            updateElement('{{ $id }}-minutes', '00');
            updateElement('{{ $id }}-seconds', '00');
            return;
        }
        
        const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
        
        const format = (num) => num.toString().padStart(2, '0');
        
        updateElement('{{ $id }}-days', format(days));
        updateElement('{{ $id }}-hours', format(hours));
        updateElement('{{ $id }}-minutes', format(minutes));
        updateElement('{{ $id }}-seconds', format(seconds));
    }

    function updateElement(id, newValue) {
        const element = document.getElementById(id);
        if (element && element.textContent !== newValue) {
            element.classList.add('updated');
            element.textContent = newValue;
            setTimeout(() => element.classList.remove('updated'), 600);
        }
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
});
</script>
@endif
