<template>
    <div>
      <h1>Composant dynamique</h1>
      <!-- Ici tu peux afficher un autre composant basé sur `name` -->
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        name: "Home", // Ici tu peux changer dynamiquement la valeur de `name`
      };
    },
    computed: {
      // Utilise une propriété calculée pour importer le composant dynamiquement
      dynamicComponent() {
        // Utilisation de l'alias '@' pour résoudre le chemin
        return import(`@/Pages/${this.name}.vue`);
      }
    },
    mounted() {
      this.dynamicComponent
        .then((module) => {
          // Fais quelque chose avec le composant importé
          console.log("Composant chargé:", module);
        })
        .catch((err) => {
          console.error("Erreur de chargement du composant:", err);
        });
    }
  };
  </script>

  <style scoped>
  /* Tu peux ajouter du style ici */
  </style>
