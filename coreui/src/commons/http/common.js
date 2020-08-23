import Cookies from 'js-cookie'

function options() {
    return {};
};

function getURL(url, params, headers = {}) {
    let localUrl = url || '';
    let localParams = params || {};
    let localHeaders = headers || {};
    localParams = Object.assign({}, localParams, options());
    // localHeaders['Referrer-Policy'] = 'origin'
    localHeaders['X-Requested-With'] = 'XMLHttpRequest'
    const token = Cookies.get('token');
    if (token) {
        localHeaders.Authorization = `Bearer ${token}`
    }
    return {
        urlProcess: localUrl,
        allParams: localParams,
        headersData: localHeaders,
    };
}

function createFrom(params, form) {
    let localForm = form;
    if (!localForm) {
        localForm = new FormData();
    }
    if (!params) {
        return localForm;
    }
    Object.keys(params)
        .forEach((key) => {
            simplifyParams(localForm, key, params[key]);
        });
    return localForm;
}

function simplifyParams(form, key, param) {
    if (typeof param === 'undefined' || param === null)
        return;

    if (typeof param !== 'object' || param instanceof File) {
        form.append(key, param);
        return;
    }

    if (Array.isArray(param)) {
        param.forEach((value, i) => {
            simplifyParams(form, `${key}[${i}]`, value);
        });
    } else {
        Object.keys(param)
            .forEach((subKey) => {
                simplifyParams(form, `${key}[${subKey}]`, param[subKey]);
            });
    }
}


export default {
    getURL,
    simplifyParams,
    createFrom,
};
