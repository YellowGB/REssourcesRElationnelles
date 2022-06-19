var selectedTypes = [];

// Par défaut, au chargement de la page, tous les types sont sélectionnés
var types = document.getElementsByClassName("li-type");
for (i = 0; i < types.length; i++) {
    selectedTypes.push(types[i].name);
}

// Ajoute/retire un type de la liste et envoie l'évènement de filtrage des ressources
function toggleType(type) {
    
    if (selectedTypes.indexOf(type) > -1) {
        selectedTypes = selectedTypes.filter(t => t !== type)
    }
    else {
        selectedTypes.push(type)
    }

    Livewire.emit('filterRessources', {'ressourceable_type': selectedTypes});
}