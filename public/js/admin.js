document.querySelectorAll('button[data-target]').forEach(button => {
    button.addEventListener('click', () => {
        const targetId = button.getAttribute('data-target');
        const content = document.getElementById(targetId);
        content.classList.toggle('hidden');

        // Rotate arrow
        const svg = button.querySelector('svg');
        svg.classList.toggle('rotate-180');
    });
});