import './bootstrap'

import htmx from 'htmx.org'
import _hyperscript from 'hyperscript.org'
import '@shoelace-style/shoelace/dist/themes/light.css'
import '@shoelace-style/shoelace/dist/components/input/input.js'
import '@shoelace-style/shoelace/dist/components/tag/tag.js'
import '@shoelace-style/shoelace/dist/components/alert/alert.js'
import '@shoelace-style/shoelace/dist/components/button/button.js'
import '@shoelace-style/shoelace/dist/components/checkbox/checkbox.js'
import '@shoelace-style/shoelace/dist/components/dropdown/dropdown.js'
import '@shoelace-style/shoelace/dist/components/menu/menu.js'
import '@shoelace-style/shoelace/dist/components/menu-item/menu-item.js'
import '@shoelace-style/shoelace/dist/components/avatar/avatar.js'

window.htmx = htmx
_hyperscript.browserInit()

document.addEventListener('htmx:responseError', async function () {
    const alert = Object.assign(document.createElement('sl-alert'), {
        variant: 'danger',
        closable: true,
        duration: 5000,
        innerHTML: `
        <sl-icon name="${icon}" slot="icon"></sl-icon>
        <div class="text-bold">An error occured, please refresh the page</div>
      `,
    })

    document.body.append(alert)
    return alert.toast()
})
