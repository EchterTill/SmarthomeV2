var dimmers = []

function call(api_call) {
    fetch(api_call, {mode: "no-cors"})
        .then(response => {
            console.log(response)
        });
}


class Roller {
    static open(ip, index) {
        call(`http://${ip}/roller/${index}?go=open`)
    }
    static close(ip, index) {
        call(`http://${ip}/roller/${index}?go=close`)
    }
}

class Relay {
    static toggle(ip, index) {
        call(`http://${ip}/relay/${index}?turn=toggle`)
    }
    static on(ip, index) {
        call(`http://${ip}/relay/${index}?turn=on`)
    }
    static off(ip, index) {
        call(`http://${ip}/relay/${index}?turn=off`)
    }
}


var Control = {
    Shelly: {
        Roller: {
            open: function (ip, index) {
                call(`http://${ip}/roller/${index}?go=open`)
            },
            close: function (ip, index) {
                call(`http://${ip}/roller/${index}?go=close`)
            }
        },
        Relay: {
            toggle: function (ip, index) {
                call(`http://${ip}/relay/${index}?turn=toggle`)
            },
            on: function (ip, index) {
                call(`http://${ip}/relay/${index}?turn=on`)
            },
            off: function (ip, index) {
                call(`http://${ip}/relay/${index}?turn=off`)
            }


        },
        Dimmer: {
            dim: function (ip, index, brightness) {
                call(`http://${ip}/light/${index}?brightness=${brightness}`)
            },
            on: function (ip, index) {
                call(`http://${ip}/light/${index}?turn=on`)
            },
            off: function (ip, index) {
                call(`http://${ip}/light/${index}?turn=off`)
            }
        }
    }
}



function dimmer(ip, index) {
    console.log(ip, index)
    let dimmerid = `${ip}-${index}`

    document.getElementById(dimmerid).innerHTML = `<input type='range' min='1' max='100' id='slider-${dimmerid}'> <output id='display-${dimmerid}'></output>`

    document.getElementById(`slider-${dimmerid}`).addEventListener('input', function () {
        document.getElementById(`display-${dimmerid}`).innerHTML = document.getElementById(`slider-${dimmerid}`).value
    }, false)

    document.getElementById(`slider-${dimmerid}`).addEventListener('change', function () {

        Control.Shelly.Dimmer.dim(ip, index, document.getElementById(`slider-${dimmerid}`).value)

    }, false)

}

