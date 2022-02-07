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

            document.getElementsByName('course_file_uri')[0].required = true;
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

            document.getElementsByName('photo_file_uri')[0].required = true;

            break;
        case 'App\\Models\\Video':

            video.style.display = "flex";

            break;
    }
}