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
            }

        }
    }
}