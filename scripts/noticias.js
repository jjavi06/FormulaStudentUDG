let idioma = localStorage.getItem('lang') || 'es';

// Verifica si ya está el parámetro lang en la URL
const urlParams = new URLSearchParams(window.location.search);
if (!urlParams.has('lang')) {
  // Redirige solo si NO está presente
  const newUrl = new URL(window.location.href);
  newUrl.searchParams.set('lang', idioma);
  window.location.href = newUrl.toString();
}
// Variable selectorIdioma definida en script.js
// En caso de que cambie el idioma en el select, se cambia en la url también, esto implica que 
// noticias.php se recargue y muestre las noticias con el campo lang igual al nuevo.
let languageSelector;
if(window.innerWidth < 870)
  languageSelector = document.getElementById("language-select-mobile");
else
  languageSelector = document.getElementById("language-select-pc");

languageSelector.addEventListener('change', function () {
  const nuevoLang = this.value;
  localStorage.setItem('lang', nuevoLang);
  document.documentElement.lang = nuevoLang;
  // Cambia la URL y recarga la página con el nuevo lang
  const newUrlDiffLang = new URL(window.location.href);
  newUrlDiffLang.searchParams.set('lang', nuevoLang);
  window.location.href = newUrlDiffLang.toString();
});
