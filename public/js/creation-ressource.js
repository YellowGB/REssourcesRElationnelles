const activite      = document.getElementById('activite');
const article       = document.getElementById('article');
const atelier       = document.getElementById('atelier');
const course        = document.getElementById('course');
const defi          = document.getElementById('defi');
const jeu           = document.getElementById('jeu');
const lecture       = document.getElementById('lecture');
const photo         = document.getElementById('photo');
const video         = document.getElementById('video');
const contentDivs   = document.getElementsByClassName('ressource-content');

const select        = document.getElementById('select');

// Au chargement de la page, charger les champs de contenu correspondant à la ressource à éditer
displayContentFields();

// On écoute l'évènement envoyé par la modale de sélection du type
window.addEventListener('typePicked', event => {
    // on récupère le type envoyé depuis RessourceTypePicker.php et on sélectionne l'index correspondant
    options = select.options;
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === event.detail.type) {
            options[i].selected = true;
            break;
        }
    }
    
    // On déclenche l'évènement 'change'
    const change = new Event('change');
    select.dispatchEvent(change);

    // Comme closeModal() ne fonctionne pas dans le contrôleur RessourceTypePicker,
    // on récupère le conteneur <div wire:id... de la modale et on le cache (10 div dans la modale + 7 wrappers préalables ajoutés par Livewire)
    // /!\ si on ajoute des div dans la modale, il faudra augmenter nbDivModal d'autant de div
    var nbDivModal = 17;
    var wireId = document.getElementsByTagName('div');
    wireId = wireId[wireId.length - nbDivModal];
    wireId.style.display = 'none';

    // On affiche le formulaire
    const ressource_container = document.getElementById('ressource-container');
    ressource_container.classList.remove('hidden');
});

select.addEventListener("change", (e) => { displayContentFields(); });

function displayContentFields() {
    for (var i = 0; i < contentDivs.length; i++) {
        // On cache d'abord tous les divs de contenu
        contentDivs[i].style.display = "none";

        // On retire la mention required de tous les enfants des divs de contenu pour éviter des problèmes lors de la soumission
        var nodes = contentDivs[i].childNodes;
        for (var j = 0; j < nodes.length; j++) {
            nodes[j].required = false;
        }
    }
    
    // On affiche uniquement le div correspondant au type sélectionné et on indique les champs requis
    switch (select.value) {
        case 'App\\Models\\Activite':

            activite.style.display = "flex";

            document.getElementsByName('activite_description')[0].required = true;
            document.getElementsByName('activite_starting_date')[0].required = true;
            document.getElementsByName('activite_duration')[0].required = true;

            break;
        case 'App\\Models\\Article':

            article.style.display = "flex";

            document.getElementsByName('article_source_url')[0].required = true;

            break;
        case 'App\\Models\\Atelier':

            atelier.style.display = "flex";

            document.getElementsByName('atelier_description')[0].required = true;

            break;
        case 'App\\Models\\Course':

            course.style.display = "flex";

            // document.getElementsByName('course_file_uri')[0].required = true;
            document.getElementsByName('course_file_name')[0].required = true;

            break;
        case 'App\\Models\\Defi':

            defi.style.display = "flex";

            document.getElementsByName('defi_description')[0].required = true;

            break;
        case 'App\\Models\\Jeu':

            jeu.style.display = "flex";

            document.getElementsByName('jeu_description')[0].required = true;
            document.getElementsByName('jeu_starting_date')[0].required = true;
            document.getElementsByName('jeu_link')[0].required = true;

            break;
        case 'App\\Models\\Lecture':

            lecture.style.display = "flex";

            document.getElementsByName('lecture_title')[0].required = true;
            document.getElementsByName('lecture_author')[0].required = true;
            document.getElementsByName('lecture_year')[0].required = true;
            document.getElementsByName('lecture_summary')[0].required = true;
            document.getElementsByName('lecture_analysis')[0].required = true;
            document.getElementsByName('lecture_review')[0].required = true;

            break;
        case 'App\\Models\\Photo':

            photo.style.display = "flex";

            // document.getElementsByName('photo_file_uri')[0].required = true;

            break;
        case 'App\\Models\\Video':

            video.style.display = "flex";

            break;
    }
}
