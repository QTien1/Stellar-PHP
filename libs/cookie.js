var Cookie = {
    getAll: function() {
        let cookies = document.cookie.split("; ")
        if (cookies.length>0) {
            let proc_cookies = []
            cookies.forEach(c => {
                let val = c.split("=")
                proc_cookies.push({name: val[0], value: val[1]})
            })
            return proc_cookies
        } else {
            return null
        }
    },
    get: function(name) {
        let cookies = Cookie.getAll()
        if (cookies.length > 0) {
            return cookies.find(c => c.name == name)
        } else {
            return null;
        }
    },
    create: function(name, val) {
        document.cookie = `${name}=${val};`
    },
    delete: function(name) {
        document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 UTC;` 
    }
}