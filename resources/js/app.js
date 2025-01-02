import { createApp } from 'vue';

// Importation explicite des composants
import UnitesEnseignement from './components/unites_enseignement.vue';

import ElementsConstitutifs from './resources/views/components/elements_constitutifs.vue';
const app = createApp({});

// Enregistrement des composants globalement
app.component('unites_enseignement', unites_enseignement);
app.component('elements_constitutifs', elements_constitutifs);

// Monter l'application Vue sur l'élément avec l'ID 'app'
app.mount('#app');
