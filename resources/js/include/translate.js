export function translate() {
    for (const js of [
        '/js/translate/js.cookie.min.js',
        '/js/translate/google-translate.js',
        '/js/translate/element.js?cb=TranslateInit',
    ]) {
        const script = document.body.appendChild(document.createElement('script'));
        script.async = false;
        script.src = js;
    }
}
