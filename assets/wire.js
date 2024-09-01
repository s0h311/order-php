// @ts-check

window.$ = {
    get,
    post
}

/**
 *
 * @param endpoint {string}
 * @param element {HTMLElement | string}
 * @returns {void}
 */
function get(endpoint, element) {
    doRequest(endpoint, element, 'GET');
}

/**
 *
 * @param endpoint {string}
 * @param element {HTMLElement | string}
 * @returns {void}
 */
function post(endpoint, element) {
    doRequest(endpoint, element, 'POST')
}

/**
 *
 * @param endpoint {string}
 * @param element {HTMLElement | string}
 * @param method {'GET' | 'POST' | 'PATCH' | 'DELETE'}
 * @returns {void}
 */
function doRequest(endpoint, element, method) {
    const target = typeof element === 'string' ?
        document.getElementById(element) :
        element;

    fetch(endpoint, {
        method,

    })
        .then((response) => response.text())
        .then((response) => {
            if (target) {
                target.innerHTML = response
            }
        })
}