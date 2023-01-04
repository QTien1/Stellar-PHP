document.documentElement.className = "theme-default"

let theme = Cookie.get("theme")

if (theme) {
    document.documentElement.className = theme.value
}