<div>
    <script defer>
        const themeToggler  = document.getElementById('theme-toggler');
        const sun           = document.getElementsByClassName('sun')[0];
        const moon          = document.getElementsByClassName('moon')[0];

        themeToggler.addEventListener("click", function () {
            document.body.classList.toggle('dark');
            sun.classList.toggle('hidden');
            moon.classList.toggle('hidden');

            // On met à jour les préférences de l'utilisateur dans la db
            let theme = document.body.classList.contains('dark') ? 'dark' : 'light';
            window.livewire.emit('ThemeSelected', theme);
        })
    </script>
</div>
